export default function (attributes) {
	const type = attributes.surtitleType;
	const color = attributes.badgeColor;

	return type
		? 'fr-' +
				type +
				(type === 'badge' && color ? ' fr-badge--' + color : '')
		: '';
}
