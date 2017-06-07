<div class="form-group">
    <div class="col-xs-6 col-sm-6">
	<label>Created At:</label>
	<p> {{ Carbon::parse($dateCreation)->diffForHumans() }}</p>
    </div>
    <div class="col-xs-6 col-sm-6">
	<label>Last Updated:</label>
	<p> {{ Carbon::parse($dateUpdated)->diffForHumans() }}</p>
    </div>
</div>
