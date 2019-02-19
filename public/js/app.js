var _ouibounce = ouibounce(document.getElementById('ouibounce-modal'), {
    aggressive: false,
    cookieExpire: 2,
    timer: 0,
    callback: function() {  }
	});

$('body').on('click', function() {
	$('#ouibounce-modal').hide();
});

$('#ouibounce-modal .modal-footer').on('click', function() {
    $('#ouibounce-modal').hide();
});

$('#ouibounce-modal .modal').on('click', function(e) {
    e.stopPropagation();
});

$("#popup-form").on('submit', function(e) {
	e.preventDefault();
	$("#popup-submit").attr('disabled', true);
	var fullName = $("#popup-name").val();
	$.ajax({
		url: '/newsletter/submit',
		method: 'POST',
		data: {
			_token: '{{ csrf_token() }}',
			first_name: fullName.split(' ').slice(0, -1).join(' '),
			last_name: fullName.split(' ').slice(0, -1).join(' '),
			email: $("#popup-email").val(),
			source: $("#popup-source").val(),
			list_name: $("#popup-list_name").val()
		},
		success: function() {
			$("#feedback").show();
			$("#popup-name").val('');
			$("#popup-email").val('');
		}
	})
});