<?php
	require_once 'session.php';
	require_once "../class/config/config.php";

	global $conn;
	$getBorrowedLists = $conn->prepare("SELECT * FROM borrow LEFT JOIN member ON member.id = borrow.member_id LEFT JOIN room ON room.id = borrow.room_assigned LEFT JOIN item ON item.id = borrow.item_id WHERE borrow.id IN(?)"); 
	$getBorrowedLists->execute(array(trim($_GET['borrowIds'])));
	$data = $getBorrowedLists->fetchAll();
?>
<html>
<style>
	body {
		font-size: 18px;
	}
	h4 {
		margin: 0 0 5px;
		padding: 0;
	}
</style>
<body>
	<table style="width:100%" cellpadding="0" cellspacing="0">
		<tbody>
			<tr>
				<td><img src="logo.png" class="img-responsive" /></td>
				<td style="text-align:center; font-size:13pt; font-family:'Times New Roman'">
					<p style="margin:0;padding:0;">República de Filipinas</p>
					<p style="margin:0;padding:0;font-weight:bold;">COLEGIO ESTATAL CONMEMORATIVO CARLOS HILADO</p>
					<p style="margin:0;padding:0;">Ciudad de Talisay, Negros Occidental</p>
				</td>
				<td><img src="logo.png" class="img-responsive" style="visibility: hidden" /></td>
			</tr>
			<tr>
				<td></td>
				<td style="text-align:center; font-weight:bold; padding:30px 0; font-size:18pt; font-family:'Bookman Old Style'; text-transform: uppercase;">
					Comprobante de Préstamo
				</td>
				<td></td>
			</tr>
			<tr>
				<td colspan="3" style="font-size:16pt;">
					Nombre: <?php echo $data[0]['m_fname']; ?> <?php echo $data[0]['m_lname']; ?>
				</td>
			</tr>
			<tr>
				<td colspan="3" style="font-size:16pt;">
					Aula: <?php echo ucfirst($data[0]['rm_name']); ?>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<table style="width:100%; border:1px solid #000; border-bottom: none;" cellpadding="0" cellspacing="0">
						<thead>
							<tr>
								<th style="padding:5px; font-size:14pt; font-family:'Calibri'; border-bottom:1px solid #000;">Categoría</th>
								<th style="padding:5px; font-size:14pt; font-family:'Calibri'; border-bottom:1px solid #000; border-left:1px solid #000;">Marca</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($data as $item): ?>
							<tr>
								<td style="padding:5px; font-size:14pt; font-family:'Calibri'; border-bottom:1px solid #000; text-align:center;"><?php echo $item['i_category']; ?></td>
								<td style="padding:5px; font-size:14pt; font-family:'Calibri'; border-bottom:1px solid #000; border-left:1px solid #000; text-align:center;"><?php echo $item['i_brand']; ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>

	<br/><br/><br/><br/><br/>

	<?php 
		echo "<p> ____________________</p>"; 
		echo "<p> Firma del Prestatario </p>"; 
	?>
</body>
</html>
