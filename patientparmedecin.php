<?php
	// Initialiser la session
	session_start();
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	if(!isset($_SESSION["username"])){
		header("Location: index.php");
	
        exit(); 
	}
    ?> 

 <?php  

                           
  require('config.php');

  
 
     $t=$_SESSION['username'];
    
      $query = "SELECT * FROM `users` WHERE username='$t'";
      $result = mysqli_query($conn,$query) or die(mysqli_connect_error());
      

       $user = mysqli_fetch_assoc($result);
          // vérifier si l'utilisateur est un administrateur ou un utilisateur
       $_SESSION['email'] =$user['email'] ;  
       $_SESSION['type'] =$user['type'] ;   
       $_SESSION['id'] =$user['id'] ;                  
       if($_SESSION["type"] =="medecin") {
	    ?> 
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                  
                    <h3 class="menu-title">Espace Médecin</h3><!-- /.menu-title -->
					<li>
                        <a href="indexmed.php"> <i class="menu-icon fa fa-dashboard"></i>Home </a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="patientparmedecin.php"  aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Gestion des Patients </a>
  
                    </li>
                  

         
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>


    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                           
                        </div>

                        <div class="dropdown for-message">
                            
                            <div class="dropdown-menu" aria-labelledby="message">
                                
                            </a>
                                
                            </a>
                               
                            </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="profile.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="profile.php"><i class="fa fa-user"></i> My Profile</a>

                          

                            <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                       
                        <div class="dropdown-menu" aria-labelledby="language">
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-fr"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-it"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <!-- <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Gestion des Patients </h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                          
                    </div>
                </div>
            </div>
        </div> -->

        <!-- <div class="content mt-3">

            <div class="col-sm-12">

            </div>

		<div class="col-md-6" >
		

		</div> -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

			<table class="table table-hover" style="margin-left : 15px; width: 1000px;">
				<thead  class="table-dark">
					<tr>
						<th>Nom de Patient</th>
                        <th>Date de naissance </th>
						<th> Action</th>
                        <th>Information boitier</th>
                        <th>Dashboard</th>

					
					
					
					</tr>
				</thead>
				<tbody>
				<?php
						require 'conn.php';
                        $t=$_SESSION['username'];
          
		   $sql = $conn->prepare("select * from `patient` WHERE `id`  in (select `idp` from `medecinpatient` where `idm` in ( select id from `medecin` where fullname ='$t')) and `id` not in ( select `idp` from `patientboitier` )");
		  $sql->execute();
		
						while($fetch = $sql->fetch()){

						


					?>
					<tr>
						<td><?php echo $fetch['fullname']?></td>
                        <td><?php echo $fetch['dateDeNaissance'] ?></td>	
					
								




				
	<td><input type="submit" onclick="$('.typebassoc').change();" class="btn btn-outline-dark" data-toggle="modal" data-target="#update<?php echo $fetch['id']?>"  value ="Affecter un Boitier ">   <input type="submit"  class="btn btn-outline-danger" value ="Retirer Boitier"></td>

				

				</tr>
				
					
					<div class="modal fade" id="update<?php echo $fetch['id']?>" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								
								<form method="POST" action="boitierpatient.php">
									<div class="modal-header">
										<h3 class="modal-title">Affecter Boitier </h3>
									</div>	
									<div class="modal-body">
										<div class="col-md-6 listassoc">
											
										</div>
										<div class="col-md-6">
											
											<div class="form-group">
                                            <input type="hidden" value="<?php echo $fetch['id']?>" name="id"/>
											

                                            <label> Référence  Boitier</label> 


                                            <select class="form-control typebassoc" name="ref" >
											<option>Choisir référence</option>
																	<?php
						require 'conn.php';
						$sql21= $conn->prepare("SELECT * FROM `boitier`");
						$sql21->execute();
						while($fetch21= $sql21->fetch()){

							$assoc = [];
                            $t=$fetch21['id'];
                            $sql7= $conn->prepare("select c.type,c.valeurmax,c.valeurmin,c.ref,a.frequence ,a.branche from capteur c,association a where
							c.id=a.idc and idb=$t");
                            $sql7->execute();
							

                             while($fetch7= $sql7->fetch()){
                            	$assoc[] = $fetch7;
                            }
							
					?>
							<option   data-assoc=<?php echo "'".json_encode($assoc)."'"; ?> value="<?php echo $fetch21['ref'] ?> ">
							<?php echo $fetch21['ref']  ?> 
							</option>
							<?php } ?>
						    </select>
											</div>
                                            <div class="form-group">
					<label>Date </label> 
					<input class="form-control" type="date" name="datedebut"/>
				</div>
			
											<div class="form-group">
												<button class="btn btn-outline-dark form-control" type="submit" name="affecter">Affecter</button>
											</div>
										</div>	
									</div>	
									<br style="clear:both;"/>
									<div class="modal-footer">
										<button class="btn btn-danger" data-dismiss="modal">Close</button>
									</div>
								</form>
					
						
								
							</div>
						</div>
					</div>	
					<?php  }?>
					<?php
						require 'conn.php';
                        $t=$_SESSION['username'];
          
		   $sql = $conn->prepare("select * from `patient` WHERE `id`  in (select `idp` from `medecinpatient` where `idm` in ( select id from `medecin` where fullname ='$t')) and `id` in ( select `idp` from `patientboitier` )");
		  $sql->execute();
		
						while($fetch = $sql->fetch()){

						


					?>
					<tr>
						<td><?php echo $fetch['fullname']?></td>
                        <td><?php echo $fetch['dateDeNaissance'] ?></td>	
					
								
	



				
	<td><input type="submit" class="btn btn-outline-dark" style="width:160px;text-align: center; " data-toggle="modal" data-target="#update<?php echo $fetch['id']?>" onclick="$('.typebassoc').change();"  value ="Reaffecter un Boitier ">  <input type="submit" class="btn btn-outline-danger deletebtn" data-toggle="modal" data-target="#de<?php echo $fetch['id']?>" value ="Retirer Boitier"></td>

    <td>
	<button  class="btn btn-outline-primary" data-toggle="modal"  data-target="#up<?php echo $fetch['id']?>">Voir détails de boitier </button>
			
					
			<div class="modal fade" id="up<?php echo $fetch['id']?>"  style="width=1000px" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				
				<div class="modal-content modal-lg" >
					<div  class="text-dark alert alert-light ">
					<label  ><Strong> INFORMATION BOITIER </Strong></label></div>
					<table id="example" class="table table-hover">
						<tbody>
						<?php
			$id = $fetch['id'];
			$sql1 = $conn->prepare("select * from `patientboitier` WHERE `idp`  in (select `id` from `patient` where `id`='$id')");
			$sql1->execute();
			$sql3 = $conn->prepare("select * from `boitier` WHERE `id`  in (select `idb` from `patientboitier` where `idp`='$id')");
			$sql3->execute();
			$fetch3=$sql3->execute();
			
			
			
			  
		while($fetch1 = $sql1->fetch()  ){
			$fetch3=$sql3->fetch();
			
					


$sql30="select count(idc) as id  from `association` where idb in (select id from `boitier` WHERE `id`  in (select `idb` from `patientboitier` where `idp`='$id'))";
$stmt1 = $conn->query($sql30);
$row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
$idb=$row1['id'];
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 
$ta=$fetch3['id'];
$sql50 ="select c.type,a.frequence,a.branche,c.photo from capteur c,association a where
c.id=a.idc and idb='$ta'";
?>

<thead  class="table-light" >

	<td><b>Référence boitier</b> : 
		 <span class="weak"><?php echo $fetch3['ref']?></td>
	
	</thead>
		
	<thead  class="table-light" >
	
	<td><b>Date</b>        <span>      :  </span>             <?php echo $fetch1['datedebut']?></td>
	</thead>
	
	<thead  class="table-light" >
	<td><b>Nombre capteurs</b> :
	 <?php echo $idb ?></td>
	</thead>
	
	
<td><b>Liste des capteurs </b></td>
<div class="row">
	<table>
		<thead>
		<th>Type</th>
		<th>Branche</th>
		<th>Fréquence</th>
		<th>Photo</th>
		</thead>
		<tbody>
		
<?php
			
$stmt11 = $conn->query($sql50);
$row11 = $stmt11->fetchAll(PDO::FETCH_ASSOC);
if($row11){
	$t=0;
	foreach($row11 as $array11){
		$t=$t+1;
$idca=$array11['type'];
$idcap=$array11['photo'];
$idco=$array11['frequence'];
$idci=$array11['branche'];

?>
<tr>
<td><?php echo $idca?></td>
<td><?php echo $idci?></td>
<td><?php echo $idco?></td>
<td><img width="70px " src="<?php echo $idcap?>"/></td></tr>
		</tbody>
	
	
	
			
	
			









	

	
	

		
			<?php
}}










		
	?>
	

				

</table>
	
				<div class="modal-footer">
							<button class="btn btn-danger" data-dismiss="modal">Fermer</button>

						</div>		
			</div>
			</div>
		</div>
                        
                   </td>
                  
          <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
<div class="modal fade" id="de<?php echo $fetch['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Retirer boitier patient </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="deleteBoitier.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" value="<?php echo $fetch['id']?>" name="id">

                        <h4>Voulez vous retirer la boite de façon définitve?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Non </button>
                        <button type="submit" name="deletedata" class="btn btn-primary">Oui! Supprimer </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

                    <td>
						<button  class="btn btn-outline-primary" data-toggle="modal" onclick="fat('<?php echo $idb ?>')" data-target="#p">  Voir ses Données
                    </button>
			
				
                
                    <?php } ?> 

					</tr>
                   
                  
                    </tbody>

					
	


					<div class="modal fade" id="update<?php echo $fetch['id']?>" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
				
								
								<form method="POST" action="reaffecterboitier.php">
									<div class="modal-header">
										<h3 class="modal-title">Reaffecter Boitier </h3>
									</div>	
									<div class="modal-body">
										<div class="col-md-6 listassoc">
										

										</div>
										<div class="col-md-6">
											
											<div class="form-group">
                                            <input type="hidden" value="<?php echo $fetch['id']?>" name="id"/>
											<input type="hidden" value="<?php echo $b?>" name="idp"/>

			
                                            <label> Référence Boitier </label> 
                                            <select class="form-control typebassoc" name="ref" >
											<option>Modifier référence</option>
																	<?php
						require 'conn.php';
						$sql21= $conn->prepare("SELECT * FROM boitier ");
						$sql21->execute();
                        
                       
						while($fetch21= $sql21->fetch()){
							$assoc = [];
                            $t=$fetch21['id'];
                            $sql7= $conn->prepare("select c.type,c.valeurmax,c.valeurmin,c.ref,a.frequence,a.branche from capteur c,association a where
							c.id=a.idc and idb=$t");
                            $sql7->execute();

                            while($fetch7= $sql7->fetch()){
                            	$assoc[] = $fetch7;
                            }

                           

					?>
							<option data-assoc=<?php echo "'".json_encode($assoc)."'"; ?> value="<?php echo $fetch21['ref'] ?> ">
							<?php echo $fetch21['ref'] ?></option>
							<?php } ?>
						    </select>
                            <div class="form-group">
											</div>
                                            <div class="form-group">
					<label>Date </label> 
					<input class="form-control" type="date" name="datedebut"/>
				</div>
                       
											<div class="form-group">
												<button class="btn btn-outline-dark" type="submit" name="affecter">ReAffecter</button>
											</div>
										</div>	
									</div>
								</div>
                                    </form>
									<br/>
									<div class="modal-footer">
										<button class="btn btn-danger" data-dismiss="modal">Fermer</button>
									</div>
								</form>
					
						
								
							</div>
						</div>
					</div>	
					<?php }  ?>
					
                   </td>
				
			</table>
                                   
            
                            
                            
                            
	
	</div>
	

	<div class="modal fade" id="p"  style="height=50% " >
            
			<div class="modal-dialog" >
					<div class="modal-content" >
					  <form action="patientparmedecin.php" >
						<div  class="text-danger alert alert-light "  >
						<div style="height=10% ">

						<div id="chartContainer">


					 

					   </div>
				  

					<div class="modal-footer">
								<button class="btn btn-danger" data-dismiss="modal">Fermer</button>

							</div>	
			</form>	
				</div>
				
				</div>
			
			</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script type="text/javascript" src="jquery.js"></script>
<script src="https://d3js.org/d3.v7.min.js"></script>
<script>
        $(document).ready(function () {

            $('.deletebtn').on('click', function () {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
    </script>
<script>

$(document).ready(function() {
$('#example').DataTable(); 
} );

function fat(nombrecapture){

//vider la zone des charts
$("#chartContainer").html("");

//pour chaque capture creer un chart element 
for (let i = 0; i < nombrecapture; i++) {
if (i==0) {
	var chart = document.createElement('canvas');
	chart.id = 'LM200';
	chart.className = 'LM200';
	document.getElementById('chartContainer').appendChild(chart);
}

if (i==1) {
	var chart = document.createElement('canvas');
	chart.id = 'LM393';
	chart.className = 'LM393';
	document.getElementById('chartContainer').appendChild(chart);	
}

if (i==2) {
	var chart = document.createElement('canvas');
	chart.id = 'pT100';
	chart.className = 'pT100';
	document.getElementById('chartContainer').appendChild(chart);
}

}
let filename = 'LM200.csv';

// all of your code should be inside this command
d3.csv(filename).then(function(loadedData) {
	
		let data =   [];
		let labels = [];
		
		// use a for-loop to load the data from the
		// file into our lists
		for (let i=0; i<loadedData.length; i++) {
			let x_tab =     loadedData[i].tention;
			let y_tab = loadedData[i].temps;
			labels.push(x_tab);
	
			// and mean temp to the data
			data.push(y_tab); 
			console.log(data)
			
}
				// basic line chart settings
			if($("#LM200").length > 0){

			var ctx = $("#LM200");
			var myChart = new Chart(ctx, {
			type: 'line',
					data: {
						labels: labels,
						datasets: [{
							data: data,
						
							borderColor: [
								'rgba(255, 99, 132, 1)',
								'rgba(54, 162, 235, 1)',
								'rgba(255, 206, 86, 1)',
								'rgba(75, 192, 192, 1)',
								'rgba(153, 102, 255, 1)',
								'rgba(255, 159, 64, 1)'
							],
							borderWidth: 1
						}]
					},
					options: {
					
						title: {
							display: true,
							text: '',
							fontSize: 21,
							padding: 20,
							fontFamily: 'Calibri',
							tooltips: {enabled: false},
							hover: {mode: null},
						},  
						legend: {
							display: false
							
							
						},
						type: 'line',
						scales: {
							
						yAxes: [{
								ticks: {
									beginAtZero: true
								},  
								scaleLabel: {
								display: true,
								labelString: 'la concentration d’alcool dans la haleine'
								}
						}],
						xAxes: [{
								scaleLabel: {
								display: true,
								labelString: 'temps'
								}
						}],
						}
					}
				});
			}


			});
			let filename2 = 'LM393.csv';

// all of your code should be inside this command
d3.csv(filename2).then(function(loadedData) {
	
		let data =   [];
		let labels = [];
		
		// use a for-loop to load the data from the
		// file into our lists
		for (let i=0; i<loadedData.length; i++) {
			let x_tab =     loadedData[i].tention;
			let y_tab = loadedData[i].temps;
			labels.push(x_tab);
	
			// and mean temp to the data
			data.push(y_tab); 
			console.log(data)
			
}
				// basic line chart settings
			if($("#LM393").length > 0){

			var ctx = $("#LM393");
			var myChart = new Chart(ctx, {
			type: 'line',
					data: {
						labels: labels,
						datasets: [{
							data: data,
						
							borderColor: [
								'rgba(255, 99, 132, 1)',
								'rgba(54, 162, 235, 1)',
								'rgba(255, 206, 86, 1)',
								'rgba(75, 192, 192, 1)',
								'rgba(153, 102, 255, 1)',
								'rgba(255, 159, 64, 1)'
							],
							borderWidth: 1
						}]
					},
					options: {
					
						title: {
							display: true,
							text: '',
							fontSize: 21,
							padding: 20,
							fontFamily: 'Calibri',
							tooltips: {enabled: false},
							hover: {mode: null},
						},  
						legend: {
							display: false
							
							
						},
						type: 'line',
						scales: {
							
						yAxes: [{
								ticks: {
									beginAtZero: true
								},  
								scaleLabel: {
								display: true,
								labelString: 'la concentration d’alcool dans la haleine'
								}
						}],
						xAxes: [{
								scaleLabel: {
								display: true,
								labelString: 'temps'
								}
						}],
						}
					}
				});
			}


			});
					let filename3 = 'pT100.csv';

// all of your code should be inside this command
d3.csv(filename3).then(function(loadedData) {
	
		let data =   [];
		let labels = [];
		
		// use a for-loop to load the data from the
		// file into our lists
		for (let i=0; i<loadedData.length; i++) {
			let x_tab =     loadedData[i].tention;
			let y_tab = loadedData[i].temps;
			labels.push(x_tab);
	
			// and mean temp to the data
			data.push(y_tab); 
			console.log(data)
			
}
				// basic line chart settings
			if($("#pT100").length > 0){

			var ctx = $("#pT100");
			var myChart = new Chart(ctx, {
			type: 'line',
					data: {
						labels: labels,
						datasets: [{
							data: data,
						
							borderColor: [
								'rgba(255, 99, 132, 1)',
								'rgba(54, 162, 235, 1)',
								'rgba(255, 206, 86, 1)',
								'rgba(75, 192, 192, 1)',
								'rgba(153, 102, 255, 1)',
								'rgba(255, 159, 64, 1)'
							],
							borderWidth: 1
						}]
					},
					options: {
					
						title: {
							display: true,
							text: '',
							fontSize: 21,
							padding: 20,
							fontFamily: 'Calibri',
							tooltips: {enabled: false},
							hover: {mode: null},
						},  
						legend: {
							display: false
							
							
						},
						type: 'line',
						scales: {
							
						yAxes: [{
								ticks: {
									beginAtZero: true
								},  
								scaleLabel: {
								display: true,
								labelString: 'la concentration d’alcool dans la haleine'
								}
						}],
						xAxes: [{
								scaleLabel: {
								display: true,
								labelString: 'temps'
								}
						}],
						}
					}
				});
			}


			});

			




}

</script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
        <script type="text/javascript" src="jquery.js"></script>
       
<script src="js/jquery-3.2.1.min.js"></script>	
<script src="js/bootstrap.js"></script>	


    <!-- Right Panel -->

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);

//listassoc
        $('.typebassoc').change(function(){
        	$('.listassoc').html('')
var as = JSON.parse($('option:selected', this).attr('data-assoc'));
	    $.each(as, function(index, value) {
		  $('<div />', {
		    'text': "Type de capteur : " + value.type +"   "  +
			 ",   Vmax: " + value.valeurmax +"   "  +
			  ",   Vmin: " + value.valeurmin +"   "  +
			   "            Référence de capteur : " + value.ref +"   "  +
			    "           Fréquence de capteur :" +value.frequence +"   "  +
				 "          Branche :  "+value.branche + "   "  +
				 "*****"
		  }).appendTo('.listassoc');
		 
		});
	});
	
    </script>

</body>

</html>
<?php } ?>