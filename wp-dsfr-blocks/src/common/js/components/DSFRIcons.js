import { SVG, Path } from '@wordpress/primitives';

export default {
	tile: (
		<SVG
			xmlns="http://www.w3.org/2000/svg"
			x="0"
			y="0"
			version="1.1"
			viewBox="0 0 24 24"
		>
			<Path d="M4 1v22c0 .6.4 1 1 1h14c.6 0 1-.4 1-1V1c0-.6-.4-1-1-1H5c-.6 0-1 .4-1 1zm14.5 21.5h-13v-21h13v21z" />
			<Path d="M9 4h6v6H9zM7 13h10v1.5H7zM7 16h10v1.5H7zM17 20l-1-1v2zM14.5 19.5H16v1h-1.5z" />
		</SVG>
	),
	tilesGroup: (
		<SVG
			xmlns="http://www.w3.org/2000/svg"
			x="0"
			y="0"
			version="1.1"
			viewBox="0 0 24 24"
		>
			<Path d="M0 5v15c0 .5.4 1 1 1h9.5c.5 0 1-.4 1-1V5c0-.5-.4-1-1-1H1c-.6 0-1 .4-1 1zm10.5 15H1V5h9.5v15z" />
			<Path d="M3.5 6.5H8V11H3.5V6.5zM2 12.9h7.5V14H2v-1.1zm0 2.5h7.5v1.1H2v-1.1zm7.5 2.9-.8-.8V19l.8-.7zm-1.9-.4h1.1v.8H7.6v-.8zM12.5 5v15c0 .5.4 1 1 1H23c.5 0 1-.4 1-1V5c0-.5-.4-1-1-1h-9.5c-.6 0-1 .4-1 1zM23 20h-9.5V5H23v15z" />
			<Path d="M16 6.5h4.5V11H16V6.5zm-1.5 6.4H22V14h-7.5v-1.1zm0 2.5H22v1.1h-7.5v-1.1zm7.5 2.9-.8-.8V19l.8-.7zm-1.9-.4h1.1v.8h-1.1v-.8z" />
		</SVG>
	),
};
