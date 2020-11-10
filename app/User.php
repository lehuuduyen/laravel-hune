<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $connection = 'sqlsrvUser';

    protected $fillable = [
        'id',
        'username',
        'password',
        'facebook_id',
        'phone',
        'sex',
        'full_name',
        'birthday',
        'avatar',
        'description',
        'address',
        'fcm_token',
        'token',
        'status',
        'lattitude',
        'longtitude',
        'created_at',
        'updated_at',
        'images',
        'os',
        'version',
        'udid',
        'language',
        'contact_info'
    ];

    public static function OpenConnection()  
    {  
        $model = new User();

        try  
        {  
            $time_start = microtime(true);

            $serverName = "171.244.9.47,1433\SQLEXPRESS";
            $connectionOptions = array(
                "database" => "Hune-Users",
                "uid" => "hune-service-user",
                "pwd" => "hune@2019"
            );
            
            // Establishes the connection
            $conn = sqlsrv_connect($serverName, $connectionOptions);  
            if($conn == false)  
                die($model->FormatErrors(sqlsrv_errors()));
            return $conn;
        }  
        catch(Exception $e) 
        {  
            echo("Error! Not connect to Database");  
            return false;
        }  
    }  
     
    public static function login($email) {
        $model = new User();
        $conn = $model->OpenConnection();
        $tsql = "SELECT * FROM dbo.login WHERE email = ?";
        $params = array($email);
        $getResults = sqlsrv_query($conn, $tsql, $params);
        if ($getResults == FALSE)
            die($model->FormatErrors(sqlsrv_errors()));
        $data = array();
        while($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC))  
        {  
            $data[] = $row;
        }
        if (isset($data)) {
            return true;
        }
        
        return false;
    }

    public static function FormatErrors($errors)
    {
        /* Display errors. */
        echo "Error information: ";

        foreach ( $errors as $error )
        {
            echo "SQLSTATE: ".$error['SQLSTATE']."";
            echo "Code: ".$error['code']."";
            echo "Message: ".$error['message']."";
        }
    }

    public static function changeStatus($id, $status)
    {
        $model = new User();
        $conn = $model->OpenConnection();

        $status = $status == 1 ? 2 : 1;

        $userToUpdate = $id;
        $tsql = "UPDATE users SET status = ? WHERE id = ?";
        $params = array($status, $userToUpdate);

        $getResults = sqlsrv_query($conn, $tsql, $params);
        $rowsAffected = sqlsrv_rows_affected($getResults);
        if ($getResults == FALSE || $rowsAffected == FALSE)
            die($model->FormatErrors(sqlsrv_errors()));
        $data = $rowsAffected;
        sqlsrv_free_stmt($getResults);
        sqlsrv_close($conn);
        $time_end = microtime(true);

        return $data;
    }
}
