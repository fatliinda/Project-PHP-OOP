<div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Admin Page
                <small>Subheading</small>
            </h1>


            <?php
                    
                    

                  //  $result_set=User::find_all_users();
                  //  while($row=mysqli_fetch_array($result_set)){


                    //    echo $row['username']. "<br>";
                   // }

                  //  $result_id=User::find_user_by_id(1);
                     //    $user= User::instantiation($result_id);
                      //   echo $user->id;  
                      
                      $users=User::find_all_users();
                      foreach($users as $user){

                        echo $user->username."<br>";
                      }
                      
                      $found_user= User::find_user_by_id(1);
                    echo  $found_user->last_name;
                     

                 //   $user= new User();

                  //  $user->username="fatlinda";
                  //  $user->password="fatlinda123";
                  //  $user->first_name="fatlinda";
                  //  $user->last_name="brahaj";


                  //  $user-> create();
                    

                    $user1=User::find_user_by_id(3);
                   $user1->username="whatever1";
                   $user1->save();
                    

          ?>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Blank Page
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>