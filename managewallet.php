<?php 
	include('header.php');
	include('controllers/wallet_c.php');
	$wallet = getWallet();
?>
<link rel="stylesheet" type="text/css" href="css/managewallet.css">

<div id="funds-modal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Select Amount to Add</h4>
      </div>
      <div class="modal-body">
      	<button type="button" class="btn btn-lg btn-success" onclick="addFunds(5)">$5.00</button>
      	<button type="button" class="btn btn-lg btn-success" onclick="addFunds(20)">$20.00</button>
      	<button type="button" class="btn btn-lg btn-success" onclick="addFunds(50)">$50.00</button>
      	<button type="button" class="btn btn-lg btn-success" onclick="addFunds(100)">$100.00</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="alert-container" class="hidden">
	<div class="alert alert-success">
	  <div id="alert-msg"></div>
	</div>
</div>
<div class="row">
	<div id="form-container" class="form-container well col-md-8">
		<form class="form-horizontal" role="form">
			<legend>Wallet Balance: <div class="pull-right">$<div id="balance-value"><?php echo $wallet['balance'];?></div></div></legend>
			<div class="form-group">
				<label for="ccnum" class="control-label col-sm-2">Credit Card Number</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="ccnum" value="<?php echo $wallet['cc_num'] ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="ccdate" class="control-label col-sm-2">Expiration Date</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="ccdate" value="<?php echo $wallet['cc_date'] ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="cccity" class="control-label col-sm-2">City</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="cccity" value="<?php echo $wallet['city'] ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="ccaddress" class="control-label col-sm-2">Address</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="ccaddress" value="<?php echo $wallet['address'] ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="cczip" class="control-label col-sm-2">Zip Code</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="cczip" value="<?php echo $wallet['zipcode'] ?>">
				</div>
			</div>
			<div class="form-group">
				<div class="col-lg-10 col-lg-offset-2">
					<button type="button" class="btn btn-lg btn-primary pull-right" onclick="saveWallet()">Save</button>
				</div>
			</div>
		</form>
	</div>
	<div class="col-md-4">
		<div class="panel panel-primary">
		  <div class="panel-heading">
		    <h3 class="panel-title">Control Panel</h3>
		  </div>
		  <div class="panel-body">
		    <button id="fund-btn" type="button" class="btn btn-lg btn-default" data-toggle="modal" data-target="#funds-modal">Add Funds</button>
		    <button type="button" class="btn btn-lg btn-danger" onclick="deleteAccount()">Delete Account</button>
		  </div>
		</div>
	</div>
</div>
<script src='js/managewallet.js'></script>
<?php 
	echo file_get_contents('footer.php');
?>
