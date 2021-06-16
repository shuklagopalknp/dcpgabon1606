<style>

.col-lg-10{

	padding:5px;

}

.main-box .main-box-header {

     min-height: 0px; 

    padding: 0px;

	text-align:center;

}

.main-box-body

{

	margin-bottom:20px;

	padding: 10px 10px 10px 10px !important;

	

}

.breadcrumb

{

	padding-top: 5px;

    padding-bottom: 5px;

}

#user-profile .profile-status

{

	text-align: center;

    margin-top: 0px;

}

hr {

    margin-top: 10px;

    margin-bottom: 10px;

}

</style>

<div id="content-wrapper">

	<div class="row">

		<div class="col-lg-12">

			<div class="row">

				<div class="col-lg-12">

					<div id="content-header" class="clearfix">

						<div class="pull-left">

							<ol class="breadcrumb">

								<li><a href="<?php echo base_url('Admin_Dashboard');?>">Dashboard</a></li>

								<li class="active"><span>User Profile</span></li>								

							</ol>

						</div>

					</div>

					

				</div>

			</div>			

		

							

                            <div class="container bootstrap snippet" id="user-profile">

    

    						<div class="row">

                            	

                                

  								<div class="col-sm-3"><!--left col-->

              

								<div class="main-box">	

								<div class="main-box-body clearfix" style="margin-bottom:0px;">

                                <header class="main-box-header clearfix">

<h2>Jennifer Lawrence</h2>

</header>

<div class="profile-status">

<i class="fa fa-circle"></i> Active

</div>

      							<div class="text-center">

        <img src="http://lorempixel.com/200/200/people/9/" class="avatar img-circle img-thumbnail" alt="avatar">

        

         <h6>Upload a different photo...</h6>

        <input type="file" class="text-center center-block well well-sm">

      </div>

      							

        <div class="profile-label" style="margin-top:5px;">

<span class="label label-danger">Administrator</span>

</div>



<div class="profile-stars">



<span>Super Admin</span>

</div>



<div class="profile-since">

Member since: 05/31/2019

</div>

<div class="profile-details">

<div class="profile-message-btn center-block text-center">

<a href="#" class="btn btn-success">

<i class="fa fa-envelope"></i>

Send message

</a>

</div>

</div>





       



               

          						<!--<div class="panel panel-default">

            <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>

            <div class="panel-body"><a href="http://bootnipets.com">bootnipets.com</a></div>

          </div>-->

          

          

          						<!--<ul class="list-group">

            <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>

            <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>

            <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>

            <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>

            <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>

          </ul>--> 

               

          						<!--<div class="panel panel-default">

            <div class="panel-heading">Social Media</div>

            <div class="panel-body">

            	<i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>

            </div>

          </div>-->

          

        						</div>

                                </div>

                                

                                </div><!--/col-3-->

        						

                                

    							<div class="col-sm-9">

                                

                                <div class="main-box">	

								<div class="main-box-body clearfix">

                                

            					<ul class="nav nav-tabs">

                				<li class="active"><a data-toggle="tab" href="#personal_information">Personal Information</a></li>

                				<li><a data-toggle="tab" href="#change_pwd">Change Password</a></li>

                				

              					</ul>



              

          						<div class="tab-content">

           							

                                    <div class="tab-pane active" id="personal_information">

                <hr>

                  <form class="form" action="##" method="post" id="registrationForm">

                      <div class="form-group">

                          

                          <div class="col-xs-6">

                              <label for="first_name"><h4> Prénoms</h4></label>

                              <input type="text" class="form-control" name="first_name" id="first_name" placeholder=" Prénoms" title="enter your  Prénoms if any." value="Jennifer">

                          </div>

                      </div>

                      <div class="form-group">

                          

                          <div class="col-xs-6">

                            <label for="last_name"><h4>Nom</h4></label>

                              <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Nom" title="enter your Nom if any." value="Lawrence">

                          </div>

                      </div>

          



                      <div class="form-group">

                          <div class="col-xs-6">

                             <label for="mobile"><h4>Gender</h4></label>

                              <input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any." value="Female">

                          </div>

                      </div>

                      <div class="form-group">

                          

                          <div class="col-xs-6">

                              <label for="email"><h4>Date de naissance</h4></label>

                              <input type="text" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email." value="18/06/1986">

                          </div>

                      </div>

                      <div class="form-group">

                          

                          <div class="col-xs-6">

                              <label for="email"><h4>Dipôme ou Niveau étude</h4></label>

                              <input type="text" class="form-control" id="location" placeholder="somewhere" title="enter a location" value="MCA">

                          </div>

                      </div>

                      <div class="form-group">

                          

                          <div class="col-xs-6">

                              <label for="password"><h4>Situation Matrimoniale</h4></label>

                              <input type="text" class="form-control" name="password" id="password" placeholder="password" title="enter your password." value="Married">

                          </div>

                      </div>

                      <div class="form-group">

                          

                          <div class="col-xs-6">

                            <label for="password2"><h4>Email</h4></label>

                              <input type="text" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2." value="jennifer@gmail.com">

                          </div>

                      </div>

                      

                      <div class="form-group">

                          

                          <div class="col-xs-6">

                            <label for="password2"><h4>Numéro de téléphone principal</h4></label>

                              <input type="text" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2." value="4402078000">

                          </div>

                      </div>

                      

                      <div class="form-group">

                          

                          <div class="col-xs-6">

                            <label for="password2"><h4>Lieu de residence</h4></label>

                              <input type="text" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2." value="Panteón de Marinos">

                          </div>

                      </div>

                      

                      <div class="form-group">

                          

                          <div class="col-xs-6">

                            <label for="password2"><h4>Pays de résidence</h4></label>

                              <input type="text" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2." value="San Fernando">

                          </div>

                      </div>

                      

                      <div class="form-group">

                           <div class="col-xs-12" style="margin-top:15px;">

                                

                              	<button class="btn btn-lg btn-success" type="submit">Update</button>

                               

                            </div>

                      </div>

              	</form>

              

             

              

             </div><!--/tab-pane-->

             						

                                    <div class="tab-pane" id="change_pwd">

               

               <h2></h2>

               

               <hr>

                  <form class="form" action="##" method="post" id="registrationForm">

                      <div class="form-group">

                          

                          <div class="col-xs-12">

                              <label for="first_name"><h4>Old Password</h4></label>

                              <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter Old Password" title="enter your  Prénoms if any.">

                          </div>

                      </div>

                      <div class="form-group">

                          

                          <div class="col-xs-12">

                            <label for="last_name"><h4>New Password</h4></label>

                              <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter New Password" title="enter your Nom if any.">

                          </div>

                      </div>

          

                      <div class="form-group">

                          

                          <div class="col-xs-12">

                              <label for="phone"><h4>Confirm Password</h4></label>

                              <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Confirm Password" title="enter your phone number if any.">

                          </div>

                      </div>



                      

                      <div class="form-group">

                           <div class="col-xs-12">

                                <br>

                              	<button class="btn btn-lg btn-success" type="submit">Save Changes</button>

                               	

                            </div>

                      </div>

              	</form>

               

             </div><!--/tab-pane-->

             						

                                    

               

              					</div><!--/tab-pane-->

          						

                                </div><!--/tab-content-->

                            	</div>

                                </div>

						

							</div>

			</div>

		</div>	

	</div>

	