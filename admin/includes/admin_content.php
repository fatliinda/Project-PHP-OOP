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
                      
                      $users=User::find_all();
                      foreach($users as $user){

                        echo $user->username."<br>";
                      }
                      
                      $found_user= User::find_by_id(1);
                    echo  $found_user->last_name;
                     

                 // $user= new User();

                  // $user->username="fatlindaDudu";
                  // $user->password="fatlinda12p3";
                  // $user->first_name="fatlindapp";
                  // $user->last_name="brahapj";
                  // $user-> create();
                    

                  // $user1=User::find_by_id(6);
                 // $user1->username="Changed2";
                 //  $user1->update();

                $photos=Photo::find_all();

                foreach($photos as $photo){

                    echo $photo->filename;
                }

                echo INCLUDES_PATH;
                    

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