
	
<div class="row filters">
	<div class="col-12 col-lg-6 filter-item-left">
		<span class="hidden-sm-down">Filter by:</span> <select class="filters-select select-box filter-by-cat">
			<option value="*">Show all</option>
			<?php 
			
			if(is_home()) {
				$terms = get_terms("category"); 
			} 
			
			if(is_post_type_archive('case-studies')) {
				$terms = get_terms("case-studies-category"); 
			}
			
			if(is_post_type_archive('join-us')) {
				$terms = get_terms("department-category"); 
			}
			
			$count = count($terms); 
			if ( $count > 0 ){  
				foreach ( $terms as $term ) { 
					echo '<option value=".' . $term->slug . '">' . $term->name . '</option>\n';
				}
			} 
			
			?>
		</select>
	</div>
	
	<div class="col-12 col-lg-6 filter-item-right">
		
		<span class="hidden-sm-down">Sort by:</span> <select class="filters-select select-box filter-by-date">
			<option value="desc">Date (descending)</option>
			<option value="asc">Date (ascending)</option>
		</select>
	
	</div>
</div>

