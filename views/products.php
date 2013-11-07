			<h1><?=$title;?></h1>
			
			<!--Script Cari Jadi-->
			
			<br>
			<form action="<?php print site_url();?>backend/products/cari" method=POST>	
			<select name="CategoryID">
			<option value="">--- Pilih Kategori ---</option>
			<?php
			$query = mysql_query("select * from categories");
			while ($a = mysql_fetch_array($query))
			{
				echo"<option value=$a[CategoryID]>$a[CategoryName]</option>";
			}
			?>
			</select>
			<input type=text name="ProductName">
			<input type=submit value="cari">
			</form>
			
			<a href="<?php print site_url();?>backend/products"> <b>Tampil Semua Products</b></a>
			<br/>
			<br/>

			<?php
			   echo anchor(site_url('backend/products/form/insert/'),'Add',' class="input-submit"');	
			?>
			<br />
			

			<table>
				<tr>
					<th>No</th>
					<th>Actions</th>
					<th>ProductID</th>
				    <th>ProductName</th>
				    <th>SupplierID</th>
					<th>CategoryID</th>
					<th>QuantityPerUnit</th>
					<th>UnitPrice</th>
					<th>UnitsInStock</th>
					<th>UnitsOnOrder</th>
					<th>ReorderLevel</th>
					<th>Discontinued</th>
				</tr>
				<?php
					$no=0;
					foreach($array_products as $row):	
					$id=$row->ProductID;	
					$no++;	
					$css=($no%2==1)? '' : 'class="bg"';
				?>
				<tr <?=$css;?> >
					<td><?=$no;?>.</td>
				    <td><?=anchor(site_url('backend/products/process/delete/'.$id),'[delete]').' | '.
				    	   anchor(site_url('backend/products/form/update/'.$id),'[update]');?></td>				    
				    <td><?=$row->ProductID;?></td>	
					<td><?=$row->ProductName;?></td>
				    <td><?=$row->SupplierID;?></td>
					<td><?=$row->CategoryID;?></td>	
					<td><?=$row->SupplierID;?></td>	
					<td><?=$row->QuantityPerUnit;?></td>	
					<td><?=$row->UnitPrice;?></td>	
					<td><?=$row->UnitsInStock;?></td>	
					<td><?=$row->UnitsOnOrder;?></td>
					<td><?=$row->Discontinued;?></td>	
				</tr>
				<?php  endforeach; ?>
			</table>
			



		