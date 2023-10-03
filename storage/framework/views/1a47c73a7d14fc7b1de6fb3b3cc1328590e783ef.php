<?php
	if (empty($inputName)){
	    $inputName = 'location_id';
	}

	$airports = \App\Models\Airport::select('id', 'code', 'name', 'countryCode')->get()->toArray();
?>
<div class="item">
	<!-- Input -->
	<span class="d-block text-gray-1  font-weight-normal mb-0 text-left">
		<?php echo e($field['title'] ?? ""); ?>

	</span>
	<div class="mb-4">
		<div class="input-group border-bottom-1 py-2">
			<i class="flaticon-pin-1 d-flex align-items-center mr-2 text-primary font-weight-semi-bold"></i>
			<?php
			$location_name = "";
			$list_json = [];
			foreach ($airports as $location) {
				$list_json[] = [
						'id'    => $location['id'],
						'title' => $location['name'].' ('.$location['code'].')',
				];
			}
			?>
			<div class="smart-search border-0 p-0 form-control  height-40  bg-transparent">
				<input type="text" 
						class="smart-search-location parent_text  font-weight-bold font-size-16 shadow-none hero-form font-weight-bold border-0 p-0 " 
						<?php echo e(( empty(setting_item("flight_location_search_style")) or setting_item("flight_location_search_style") == "normal" ) ? "readonly" : ""); ?> 
						placeholder="<?php echo e(__("Where are you going?")); ?>" 
						value="<?php echo e($location_name); ?>" 
						data-onLoad="<?php echo e(__("Loading...")); ?>"
					   	data-default="<?php echo e(json_encode($list_json)); ?>"
				>
				<input type="hidden" class="child_id" name="<?php echo e($inputName); ?>" value="<?php echo e(Request::query($inputName)); ?>">
			</div>
		</div>
	</div>
	<!-- End Input -->
</div>
<?php /**PATH /Users/monirulislam/Herd/seventh-aviation/themes/Mytravel/Flight/Views/frontend/layouts/search/fields/location.blade.php ENDPATH**/ ?>