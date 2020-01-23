$(() => {
	$('#add-project-code').on('click', () => {
		if($('.project-code-field').length >= 40) {
			$('#help-max-40').show();
			return;
		}

		$('#project-code-container').append(
			$('<div>', {class: 'field is-horizontal project-code-field'}).append(
				$('<div>', {class: 'field-label is-normal'}).append(
					$('<button>', {type: 'button', class: 'delete'})
				),
				$('<div>', {class: 'field-body'}).append(
					$('<div>', {class: 'field isexpanded'}).append(
						$('<div>', {class: 'field has-addons'}).append(
							$('<p>', {class: 'control'}).append(
								$('<a>', {class: 'button is-static project-code-prefix'}).append(
									getPrefix()
								)
							),
							$('<p>', {class: 'control is-expanded'}).append(
								$('<input>', {
									type: 'text',
									class: 'input column is-half',
									name: 'project_code[]',
									placeholder: '作品コード'
								})
							)
						)
					)
				)
			)
		);
		
		$('input[name=project_code\\[\\]]').last().focus();
	});

	$('#create_owner_form').on('submit', () => {
		let isFilled = true;
		
		$('input[name=project_code\\[\\]]').each((i, elem) => {
			if($(elem).val() === '') {
				isFilled = false;
				$(elem).addClass('is-danger');
			} else {
				$(elem).removeClass('is-danger');
			}
		});
		
		if(!isFilled) {
			$('#help-not-filled').show();
		}

		return isFilled;
	});

	$('#class-select').on('change', (event) => {
		showPrefix(getPrefix());
	});

	$(document).on('keydown', 'input', (event) => {
		if ((event.key && event.key === 'Enter') || (event.which && event.which === 13) || (event.keyCode && event.keyCode === 13)) {
			return false;
		}
	});

	$(document).on('click', '.delete', (event) => {
		$(event.target).closest('.project-code-field').remove();
		$('.help-max-40').hide();
	});
	
	const showPrefix = (prefix) => {
		$('.project-code-prefix').html(prefix);
	};

	const getPrefix = () => {
		const code = $('#class-select option:selected').data('code');
		if(code === 'IT') {
			return 'I';
		}
		else if (code === 'Web') {
			return 'W';
		}
		else {
			return 'G';
		}
	};

	showPrefix(getPrefix());
});