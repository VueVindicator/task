<body>
	<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">HNG Team Storm</a>
		</div>

		<ul class="nav navbar-nav navbar-right">
			<li><a href="#"><span class="glyphicon glyphicon-user"></span> Leader: Nice Boy</a></li>
			<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Deputy: Boy</a></li>
		</ul>
	</div>
	</nav>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Message</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$i = 1;
							foreach($array_final as $value){ 
						?>
						<tr class="<?php echo $value['status'] == 'Pass' ? 'success' : 'danger' ?>">
							<td><?php echo $i ?></td>
							<td><?php echo $value['name'] ?></td>
							<td><?php echo $value['output'] ?></td>
							<td><?php echo $value['status'] ?></td>
						</tr>
						<?php
							$i++; 
							} 
						?>
					</tbody>
				</table>
				<br>
				<div>The json output is: </div><br>
				<p><?php var_dump($array_final); ?></p>
			</div>
		</div>
	</div>
