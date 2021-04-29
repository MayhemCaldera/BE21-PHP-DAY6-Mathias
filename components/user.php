<?php require_once "user_sql.php" ?>

<div class="container">
        
            <div class="row">
                
                <div class="col-8 mt-2">
                    <p class='h2'>Users</p>
                    <p>There are currently <?=$user_sum?> Users registered.</p>
                    <table class='table table-striped'>
                        <thead class='table-success'>
                            <tr>
                                <th>Picture</th>
                                <th>Name</th>
                                <th>Date of birth</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?=$tbody?>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
