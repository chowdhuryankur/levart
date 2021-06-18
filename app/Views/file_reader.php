<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to XML File Reader!</title>
	<meta name="description" content="Read Data From XML file">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>

	<style>
		body
		{
			font-family: Arial, Helvetica, sans-serif;
			margin: 0 auto;
			padding: 15px 30px;
		}
		.gnr {
			width: 100%;
			text-align: center;
			font-weight: bold;
			padding: 10px;
			font-size: 20px;
			text-decoration: underline;
		}
		#xmlData {
		border-collapse: collapse;
		width: 100%;
		}

		#xmlData td, #xmlData th {
		border: 1px solid #ddd;
		padding: 8px;
		}

		#xmlData tr:nth-child(even){background-color: #f2f2f2;}

		#xmlData tr:hover {background-color: #ddd;}

		#xmlData th {
		padding-top: 12px;
		padding-bottom: 12px;
		text-align: left;
		background-color: #009999;
		color: white;
		}
		.grdtotl
		{
			width: 100%;
			text-align: right;
			font-weight: bold;
			padding: 5px;
			font-size: 16px;
			margin: 10px 15px 0 0;
		}
	</style>
</head>
<body>
<h3>XML Content </h3>

<?php $i = 0; $grandTotal = 0; foreach($genres as $genre) { ?>
<div class="gnr">Book Genre: <?=$genre?> </div>

<table id="xmlData">
<thead>
  <tr>
    <th>Title</th>
    <th>Author</th>
	<th>Publish Date</th>
	<th>Description</th>
	<th>Price</th>
  </tr>
  </thead>
  <tbody>
  <?php $genrTotal = 0; foreach($books[$i] as $book) { ?>
  <tr>
    <td><?=$book->title?></td>
    <td><?=$book->author?></td>
	<td><?=date_format(date_create($book->publish_date),"D, d M Y")?></td>
	<td title="<?=$book->description?>"><?=substr($book->description, 0, 32).'...'?></td>
	<td><?=$book->price?></td>
  </tr>
  <?php $genrTotal += $book->price; } ?>
  <tr>
    <td></td>
    <td></td>
	<td></td>
	<td><b>Total:</b></td>
	<td><?=$genrTotal?></td>
  </tr>
  </tbody>
</table> 
<?php $grandTotal += $genrTotal; $i++; } 
echo "<div class = 'grdtotl'>Grand Total: ". $grandTotal."</div>"; ?>

</body>
</html>