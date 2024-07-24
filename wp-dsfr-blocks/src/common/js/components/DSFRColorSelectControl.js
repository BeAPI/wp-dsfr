import { __ } from '@wordpress/i18n';
import { SelectControl } from '@wordpress/components';
import getDSFRColorList from '../utils/getDSFRColorList';

export default function (props) {
	const colorsList = getDSFRColorList();
	const options = [
		{
			label: __('Défaut', 'wp-dsfr-blocks'),
			value: '',
		},
	];

	for (const color in colorsList) {
		options.push({
			label: colorsList[color],
			value: color,
		});
	}

	props = Object.assign(
		{
			label: __('Couleur du bloc', 'wp-dsfr-blocks'),
		},
		props,
		{ options }
	);

	return <SelectControl {...props} />;
}
