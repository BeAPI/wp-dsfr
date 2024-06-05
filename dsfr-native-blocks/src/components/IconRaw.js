/**
 * External dependencies
 */
import parse from 'html-react-parser';
/**
 * WordPress dependencies
 */
import { Icon } from '@wordpress/components';

export default function IconRaw({ content }) {
	if (!Boolean(content)) {
		return <></>;
	}

	return (
		<Icon
			icon={() =>
				parse(content, {
					trim: true,
					replace: (domNode) => {
						if (domNode.type === 'tag' && domNode.name === 'svg') {
							domNode.attribs.focusable = 'false';
							domNode.attribs['aria-hidden'] = 'true';
						}
						if (
							domNode.type !== 'tag' ||
							(!domNode.parent && domNode.name !== 'svg') ||
							!domNode.name
						) {
							return <></>;
						}
					},
				})
			}
		/>
	);
}
