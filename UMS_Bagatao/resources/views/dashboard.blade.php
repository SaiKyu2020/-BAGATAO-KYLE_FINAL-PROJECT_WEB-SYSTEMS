@extends('layouts.layout')
  
@section('content')
<div class="container" style="margin: 50px; align">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
  
                <div class="card-body">
                    @if (Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
  
                    <h3>Table</h3>
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $database = "laravel";

                            $connection = new mysqli($servername, $username, $password, $database);
                            
                            if($connection->connect_error){
                                die("Connection failed: ". $connection->connect_error);
                            }

                            $sql = "SELECT * FROM users";
                            $result = $connection->query($sql);

                            if(!$result){
                                die("Invalid query: ". $connection->error);
                            }

                            while($row = $result->fetch_assoc()){
                                echo" 
                                <tr>
                                    <td>" . $row["id"] . " </td>
                                    <td>" . $row["name"] . " </td>
                                    <td>" . $row["email"] . " </td>
                                    <td>" . $row["password"] . " </td>
                                    <td> </td>
                                </tr>
                                ";
                            }

                           
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection