<?php
       session_start();
       require_once('../../services/Admin_Service/about_us.php');
       if(!isset($_COOKIE['username']) ){
   
           header('location: ../login.php?error=invalid_request');
       }

 ?> 
<!DOCTYPE html>
<html>
    <head>
        <title>
            add About Us
        </title>
        <link rel="stylesheet" type="text/css" href="../../asset/all_designs/Admin_designs/about_us.css">
        <script type="text/javascript" src="../../asset/js/Admin_js/about_us.js"></script>
        <meta charset = "UTF-8"/>
      
        <body>
            <header>
                <p class="logo">MNP ACADEMY</p>
                <nav>
                    <ul class="nav-links">
                        <li><a href="#">Home</a></li>
                        <li><a href="../learner_view/aboutUs.php">About Us</a></li>
                        <li><a href="#">Service</a></li>
                    </ul>
                </nav>
                <nav>
                    <ul class="nav-links">
                    <a  href="#"><buttonp> </buttonp></a>
                    <a  href="../../php/logout.php"><button>logout</button></a>
                   </ul>
            </nav>
            </header>
            <main >
                <div class="Gridviewdiv" >
                	<ul>
                    <li class="imgbtn">jsbujruer</li>
                    <li><?php echo $_SESSION['name'];?></li>
                		<li><a href="#">Dashboard</a></li>
                		<li><a href="Add_Admin.php">Admin Profile</a></li>
                		<li>Manage Users</li>
                		<li>Courses</li>
                		<li>Learners</li>
                		<li><a href="about_us.php">About Us</a></li>
                		<li><a href="Manage_Blog.php">Manage Blog</a></li>
                    </ul>
                    </div>
                    <div >
                        <div class="div-search">
                        <input type="text" name="search" placeholder="Search by title">
                        <input type="button">
                        </div>

                        <div class="div-show">
                              <div class="button-container-div">
                                  <input type="button" value="About Us">
                                  <input type="button" value="Add" onclick="about_popup_open()">
                              </div>
                              
                               
                    
                              <div class="Table">
                                  <table>
                                      <tr>
                                          <th >Id</th>
                                          <th>Title</th>
                                          <th>Sub Title</th>
                                          <th>Descriptions</th>
                                          <th>Actions</th>
                                
                                      </tr>
                                      <?php
                                          $aboutData=getAboutUs();
                                          for($i=0; $i<count( $aboutData);$i++)
                                          {
                                              ?>
                                            <tr>
                                                <td><?=$aboutData[$i]['Id']?></td>
                                                <td><?=$aboutData[$i]['Title']?></td>
                                                <td><?=$aboutData[$i]['SubTitle']?></td>
                                                <td><?=$aboutData[$i]['Descriptions']?></td>
                                               
                                          <td><input type="button" value="Edit" onclick="edit_popup_open()"> 
                                          <a href="#">Delete</a>
                                          </td>
                                          </tr><?php
                                          }

                                 
                                         ?>
                                  </table>
                              </div>


                        <!-- for add post -->
                        <div class= "bg-modal"  id="bg-modal">
			            <div class = "modal-content">
				         <div class="close" onclick="about_popup_close()">+</div>
                            <form action="../../php/admin_php/about_us.php" onsubmit=return validation() method="post">
					        <table>
						    <tr >
							<td>Title</td>
							<td>:</td>
							<td><input id="title" name="title" type="text" onkeyup="Title_Remover()" onblur="Title_empty()"></td>
							<td><i  id="titleMsg" style="color:white; font-size: 10px;"></i></td>
						</tr>		
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>Sub Title</td>
							<td>:</td>
							<td>
								<input type="text" class= "Sub-Title" id="sub_title" name="sub_title"  onkeyup="ST_Remover()" onblur="ST_empty()">
							</td>
							<td ><i id="ST_Msg" style="color:white;font-size: 10px; white-space: pre;"  ></i></td>
						</tr>		
						<tr><td colspan="4"><hr/></td></tr>
						<tr class= "Description">
							<td>Descriptions</td>
							<td>:</td>
                            <td height="30px"><textarea id="descriptions"  name="descriptions" rows="8" cols="30" onkeyup="des_Remover()" onblur="des_eMpty()" ></textarea></td> 
							<!-- <td><input type="text" id="descriptions"  name="descriptions"  onkeyup="des_Remover()" onblur="des_eMpty()"></td> -->
							<td><i id="descriptionMsg"  style="color:white;font-size: 10px;"></i></td>
						</tr>		
						<tr><td colspan="4"><hr/></td></tr>
					 </table>
                	  <input type="submit"  name="submit" value="Submit" class="Submitbtn" >
            		</form> 
                    </div>
                    </div>

<!-- for edit post and open modal -->
                        <div class= "bg-modal_edit"  id="bg-modal_edit">
			            <div class = "modal-content_edit">
				         <div class="close" onclick="edit_popup_close()">+</div>
                         
                            
                    </div>
                    </div>
                              
                        
    </div>
    </div> 
                

                
                
            </main>
        
        </body>
    </head>
</html>