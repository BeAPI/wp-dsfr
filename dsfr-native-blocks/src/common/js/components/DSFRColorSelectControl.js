import { __ } from '@wordpress/i18n';
import { SelectControl } from '@wordpress/components';
import getDSFRColorList from '../utils/getDSFRColorList';

export default function (props) {
	const colorsList = getDSFRColorList();
	const options = [
		{
			label: __('Default', 'dsfr-native-blocks'),
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
			label: __('Block color', 'dsfr-native-blocks'),
		},
		props,
		{ options }
	);

	return <SelectControl {...props} />;
}
