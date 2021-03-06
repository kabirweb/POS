			<div class="profile-feed row-fluid">
				<div class="span12">
					<div class="span6">
@if( !empty($activities) )
<?php $counter=0; $totalActivities = count($activities); $halftotalActivities = ceil($totalActivities / 2); ?>

@foreach( $activities as $key => $activity )
						<div class="itemdiv commentdiv">
							<div class="user">
								<?php $genderx =  User::where('id', $activity->user_id)->pluck('gender'); ?>
								<?php $imagex = "uploads/img/". $genderx ."5.png"; ?>
								{{HTML::image($imagex, 'Staff Avatar', array('width'=>'48', 'class'=>'img-circle'))}}
							</div>
							<div class="body">
							  	@include('activity_layouts.user', $activity)
							</div>
						</div>
			<?php ++$counter; unset($activities[$key]);  if( $counter == $halftotalActivities ){break;}?>
@endforeach
@endif
					</div><!--/span-->

					<div class="span6">
@if( !empty($activities) )
@foreach( $activities as $activity )
						<div class="itemdiv commentdiv">
							<div class="user">
								<?php $genderx =  User::where('id', $activity->user_id)->pluck('gender'); ?>
								<?php $imagex = "uploads/img/". $genderx ."5.png"; ?>
								{{HTML::image($imagex, 'Staff Avatar', array('width'=>'48', 'class'=>'img-circle'))}}
							</div>
							<div class="body">
							  	@include('activity_layouts.user', $activity)
							</div>
						</div>
@endforeach
@endif
					</div><!--/span-->
				</div>
			</div>


<script>
$(document).ready(function(){
	/*$('body').ajaxablePopover({
		loader: '<div style="text-align:center"><i class="icon-spinner icon-spin icon-3x"></i><br>Loading...</div>',
		delay: { show: 10000, hide: 0 },
		trigger: 'hover',
	});*/
		
	//Modal call for Add product
	var activityx = function (e){
		var $that = $(this), url = $(this).attr('data-url');

		//unbind click event
		$that.off('click.activityx', activityx);

		$.get(url, function(data) {

			cloneModalbox( $('#myModal') )
			.modal()
			.css({'width':'500px'})
			.centerModal()
			.find('.modal-body').html(data)
				.end()
			.find('.modal-header h3')
			.text('Preview receipt')
			.css({'color':'white'}).removeClass('red lighter')
				.end()
			.find('.modal-footer > [data-ref="submit-form"]').hide();

			//Rebind click event
			$that.on('click.activityx', activityx);

		});
	};

	$("[data-rel='popover']").on('click.activityx', activityx);
});
</script>