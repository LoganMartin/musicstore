<?php 
	include('header.php');
?>
<link rel="stylesheet" type="text/css" href="css/managestore.css">

<div id="artist-modal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Enter Artist Information</h4>
      </div>
      <div class="modal-body">
      	<p>test</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Add to Artists</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="song-modal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Enter Song Information</h4>
      </div>
      <div class="modal-body">
      	<p>test2</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Add To Store</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="control-panel" class="well">
	<h2>Manage Store</h2>
	<button id="artist-btn" type="button" class="btn btn-lg btn-default" data-toggle="modal" data-target="#artist-modal">Add Artist</button>
	<button id="song-btn" type="button" class="btn btn-lg btn-default" data-toggle="modal" data-target="#song-modal">Add Song</button>
</div>
<script src='js/managestore.js'></script>
<?php 
	echo file_get_contents('footer.php');
?>