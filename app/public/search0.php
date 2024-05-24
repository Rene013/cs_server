<?php

include'template/header.php';
//include'$includes_dir/$overall/header.html';
?>
<script type="text/javascript" src="js/jquery.autocomplete.js"></script>
<script type="text/javascript" src="js/mustache.js"></script>
<script type="text/javascript" src="js/jquery.mustache.js"></script>
<script type="text/javascript" src="js/functionsearchers.js"></script>
<div class="clearfix" style="height:20px"></div>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="sectionHeader">
				<img id="aImg" class="img-responsive img-rounded" src="<?php echo Config::get('uri_parts/base');?>/images/betop.jpg">
				<h1 id="aCaption">Search</h1>
				<h3 class="hidden-xs" id="missionTitle"></h3>
				<h4 class="hidden-xs" id="missionStatement"></h4>
					<div class="credit">
					<p id="aCredit">© Betop Corporation</p>
					</div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<section class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
			<div class="hidden-xs">
				<nav class="breadcrumb" style="margin-top: 20px;"><ul itemscope itemtype="http://schema.org/Breadcrumb" class="breadcrumb">
				<li class="first"><a itemprop="url" href="index.php"><span itemprop="title">Home</span></a></li><li><a itemprop="url" href="<?php echo Config::get('uri_parts/base');?>/search.php"><span itemprop="title">Search</span></a></li>
				</ul>
				</nav>
			</div>
			<h1 class="pageTitle">Search Results</h1>
			<div id="searchResultsContainer">
				<div class="row">
					<div class="col-md-12" id="searchForm">
						<div class="col-md-4 pull-left">
							<form role="search" class="searchform">
							<div class="input-group">
								<input type="text" name="keywords" id="searchKeywords" placeholder="search" value="search" class="form-control searchKeywords">
								<span class="input-group-btn">
								<button type="submit" class="btn btn-default btn-search">
								<i class="fa fa-search"></i>
								</button>
								</span>
								<input type="hidden" name="betopcorporation" id="betopcorporation" value="betopcorporation">
							</div>
							</form>
						</div>
						<div class="col-md-8">
							<form>
								<div class="form-group">
									<div class="col-md-4 text-right" >
										<label for="sortBy" class="sortlabel">Sort By</label>
									</div>
									<div class="col-md-4 text-right">
										<select name="sortBy" id="sortBy" class="form-control">
											<option value="_score">Relevance</option>
											<option value="sortdate">Date</option>
											<option value="title">Title</option>
										</select>
									</div>
									<div class="col-md-4 text-right">
										<select name="sortDirection" id="sortDirection" class="form-control">
											<option value="asc">Ascending</option>
											<option value="desc" selected>Descending</option>
										</select>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="row" id="resultsSummary">
					<div class="col-md-6">
						<p>Your search for "<?php echo $query ?>" returned  results</p>
					</div>
				</div>
				<div class="row" id="keywordSuggestion">
					<div class="col-md-6">
					</div>
				</div>
				<div class="row">
					<div class="col-md-12" id="searchResults">
						<div class="searchResult">	
							<a href="<?php echo Config::get('uri_parts/base');?>/search-results"><h3>Search Results</h3></a>
							<p><?php echo date("m/d/Y"); ?></p>
						</div>
					</div>
				</div>
			</div>
			<div class="row" id="searchResultsPagination">
				<div class="searchPageOptions">
					<div class="col-md-3">
						<form>
							<div class="input-group">
								<label>Results per page</label>
								<select name="perPage" id="perPage" class="form-control">
									<option value="10" selected>10</option>
									<option value="25" >25</option>
									<option value="50" >50</option>
									<option value="100" >100</option>
								</select>
							</div>
						</form>
					</div>
				</div>
				<div class="searchResultsPagination">
					<div class="col-md-9 text-right">
						<nav>
							<ul class="pagination">
								<li class="active">
									<a href="?page=1&amp;siteID=<?php echo Config::get('uri_parts/base');?>&amp;keywords=search&amp;tag=&amp;sectionID=&amp;categoryID=&amp;sortDirection=desc&amp;sortBy=_score&amp;perPage=10&amp;category=&amp;section=&amp;selectedYear=&amp;contenttype=&amp;newSearch=true" aria-label="1">
										<span aria-hidden="true">1</span>
									</a>
								</li>
								<li>
									<a href="?page=2&amp;siteID=<?php echo Config::get('uri_parts/base');?>&amp;keywords=search&amp;tag=&amp;sectionID=&amp;categoryID=&amp;sortDirection=desc&amp;sortBy=_score&amp;perPage=10&amp;category=&amp;section=&amp;selectedYear=&amp;contenttype=&amp;newSearch=true" aria-label="Next">
										<span aria-hidden="true">Next</span>
									</a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</section>
		<?php include'template/asidenews.php';?>
	</div>
	</div>
<?php include'template/footer.php';?>	
			
			
			
			