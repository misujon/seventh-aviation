<?php
	$minValue = 0;
;?>
<div class="item">
	<div class="dropdown-custom px-0 mb-4 custom-select-dropdown-parent">
		<span class="d-block text-gray-1 text-left font-weight-normal">{{ $field['title'] ?? "" }}</span>
		<div class="flex-horizontal-center border-bottom-1  py-2 d-flex  dropdown-toggle" data-toggle="dropdown">
			<i class="flaticon-plus d-flex align-items-center mr-2 text-primary font-weight-semi-bold"></i>
			@php
				$seatTypeGet = request()->query('seat_type',[]);
			@endphp
			<div class="text-black font-size-16 font-weight-semi-bold mr-auto height-40 d-flex align-items-center overflow-hidden">
				<div class="render">
					Travelers
				</div>
			</div>
		</div>
		<div class="dropdown-menu custom-select-dropdown">
			<div class="dropdown-item-row">
				<div class="label">Adult</div>
				<div class="val">
					<span class="btn-minus" data-input="adult" data-input-attr="id"><i class="icon ion-md-remove"></i></span>
					<span class="count-display"><input id="adult" type="number" name="seat_type[adult]" value="1" min="1"></span>
					<span class="btn-add" data-input="adult" data-input-attr="id"><i class="icon ion-ios-add"></i></span>
				</div>
			</div>
			<div class="dropdown-item-row">
				<div class="label">Child</div>
				<div class="val">
					<span class="btn-minus" data-input="child" data-input-attr="id"><i class="icon ion-md-remove"></i></span>
					<span class="count-display"><input id="child" type="number" name="seat_type[child]" value="0" min="0"></span>
					<span class="btn-add" data-input="child" data-input-attr="id"><i class="icon ion-ios-add"></i></span>
				</div>
			</div>
			<div class="dropdown-item-row">
				<div class="label">Infant</div>
				<div class="val">
					<span class="btn-minus" data-input="infant" data-input-attr="id"><i class="icon ion-md-remove"></i></span>
					<span class="count-display"><input id="infant" type="number" name="seat_type[infant]" value="0" min="0"></span>
					<span class="btn-add" data-input="infant" data-input-attr="id"><i class="icon ion-ios-add"></i></span>
				</div>
			</div>
			{{-- @foreach($seatType as $type)
				<?php
                // $inputName = 'seat_type_'.$type->code;
                // $inputValue = $seatTypeGet[$type->code] ?? $minValue;
                ;?>
			
				<div class="dropdown-item-row">
					<div class="label">{{__('Adults :type',['type'=>$type->name])}}</div>
					<div class="val">
						<span class="btn-minus" data-input="{{$inputName}}" data-input-attr="id"><i class="icon ion-md-remove"></i></span>
						<span class="count-display"><input id="{{$inputName}}" type="number" name="seat_type[{{$type->code}}]" value="{{$inputValue}}" min="{{$minValue}}"></span>
						<span class="btn-add" data-input="{{$inputName}}" data-input-attr="id"><i class="icon ion-ios-add"></i></span>
					</div>
				</div>
			@endforeach --}}
		</div>
	</div>
</div>