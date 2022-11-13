<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Codeigniter page scroll load more </title>


	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

</head>

<body>
	<div class="container">

		<div class="alert alert-info" style="position: fixed; width: 1140px" ;>

			<h1 style="color: #000000;">Load More Records On Button Click Using Codeigniter</h1>

			<small>By <a href="http://webrocom.net" style="color:red" ;>webrocom.net</a> </small>
		</div>
	</div>


	<div class="container" style="margin-top: 120px;">
		<h3>Ajax country list</h3>

		<table class="table">
			<thead>

				<tr>
					<th>SN</th>
					<th>Country name</th>

					<th>Country code</th>
				</tr>

			</thead>
			<tbody id="ajax_table">
			</tbody>
		</table>
		<div class="container" style="text-align: center"><button class="btn" id="load_more" data-val="0">Load
				more..<img style="display: none" id="loader" src=""> </button></div>
	</div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<script>
		$(document).ready(function () {

			// console.log("<?php echo base_url(); ?>"+"/cualquier");


			getcountry(0);
			$("#load_more").click(function (e) {
				e.preventDefault();
				var page = $(this).data('val');
				console.log(page);
				getcountry(page);
			});
		});
		
		
		var getcountry = function (page) {
			$("#loader").show();
			$.ajax({
				url: "<?php echo base_url(); ?>index.php/welcome/getCountry",
				type: 'GET',
				data: { page: page }
			}).done(function (response) {
				$("#ajax_table").append(response),
					$("loader").hide(),
					$('#load_more').data('val', ($('#load_more').data('val') + 1));
				scroll();
			});
		};
		var scroll = function () {
			$('html', 'body').animate({
				scrollTop: $('#load_more').offset().top
			}, 1000);
		};
	</script>

</body>

</html>