<?php 
	include('header.php');
	include('controllers/managestore_c.php');
?>
<link rel="stylesheet" type="text/css" href="css/managestore.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.10.4.custom.min.css">

<div id="artist-modal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Enter Artist Information</h4>
      </div>
      <div class="modal-body">
      	<div id="alert-container" class="hidden">
			<div class="alert alert-success">
			  <div id="alert-msg"></div>
			</div>
		</div>
      	<div class="form-group">
			<label for="artistName" class="control-label">Artist Name:</label>
			<input type="text" class="form-control" id="artistName">
		</div>
		<div class="form-group">
			<label for="artistOrigin" class="control-label">Artist Origin:</label>
			<input type="text" class="form-control" id="artistOrigin">
		</div>
		<div class="form-group">
			<label for="artistYear" class="control-label">Artist Year:</label>
			<input type="text" class="form-control" id="artistYear">
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="addArtist()">Add to Artists</button>
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
      	<div id="alert-container-song" class="hidden">
			<div class="alert alert-success">
			  <div id="alert-msg-song"></div>
			</div>
		</div>
      	<div class="form-group">
			<label for="songName" class="control-label">Name:</label>
			<input type="text" class="form-control" id="songName">
		</div>
		<div class="form-group autocomplete">
			<label for="songArtist" class="control-label">Artist:</label>
			<input type="text" class="form-control" id="songArtist">
		</div>
		<div class="form-group">
			<label for="songAlbum" class="control-label">Album:</label>
			<input type="text" class="form-control" id="songAlbum">
		</div>
		<div class="form-group">
			<label for="songLength" class="control-label">Length:</label>
			<input type="text" class="form-control" id="songLength">
		</div>
		<div class="form-group">
			<label for="songGenre" class="control-label">Genre:</label>
			<input type="text" class="form-control" id="songGenre">
		</div>
		<div class="form-group">
			<label for="songPrice" class="control-label">Price:</label>
			<input type="text" class="form-control" id="songPrice">
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="addSong()">Add To Store</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="control-panel" class="well">
	<h2>Manage Store</h2>
	<button id="artist-btn" type="button" class="btn btn-lg btn-default" data-toggle="modal" data-target="#artist-modal">Add Artist</button>
	<button id="song-btn" type="button" class="btn btn-lg btn-default" data-toggle="modal" data-target="#song-modal">Add Song</button>
</div>
<script>
	var artists = <?php echo getArtistsArray();?>;
</script>
<script src='js/jquery-ui-1.10.4.custom.min.js'></script>
<script src='js/managestore.js'></script>
<?php 
	echo file_get_contents('footer.php');
?>