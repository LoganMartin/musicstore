<?php
	include('header.php');
?>
<link rel="stylesheet" type="text/css" href="css/store.css">

<div id="artist-modal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Artist Information</h4>
      </div>
      <div class="modal-body">
      	<div class="form-group">
			<label class="control-label">Artist Name:</label>
			<p class="form-control-static" id="artistName"></p>
		</div>
		<div class="form-group">
			<label class="control-label">Artist Origin:</label>
			<p class="form-control-static" id="artistOrigin"></p>
		</div>
		<div class="form-group">
			<label class="control-label">Artist Debut Year:</label>
			<p class="form-control-static" id="artistYear"></p>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<h1>Storefront</h1>
<div id="search-container" class="pull-right">
	<div class="input-group">
  		<input id="search-field" type="text" class="form-control">
	  	<span class="input-group-btn">
	  		<button id="search-btn" class="btn btn-primary" type="button" onclick="searchStore()">Search</button>
	  	</span>
    </div><!-- /input-group -->
</div>
<div id="results-container">
	<div id="results-panel" class="panel panel-default">
	  <div class="panel-heading">
	  	<b>Results: </b>
	  </div>
	  <div id="table-container"><h3>Enter a song, artist, or album to search for...</h3></div>
	</div>
</div>
<script src='js/jquery.tablesorter.min.js'></script>
<script src='js/store.js'></script>
<?php 
	echo file_get_contents('footer.php');
?>