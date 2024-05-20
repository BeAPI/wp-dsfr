import { withSelect } from '@wordpress/data';
import { compose } from '@wordpress/compose';

const TabsFocus = ({ activeTabIndex, setAttributes }) => {
	if (activeTabIndex > -1) {
		setAttributes({ activeTabIndex });
	}
};

export default compose([
	withSelect((select, ownProps) => {
		const {
			getBlockName,
			getBlockIndex,
			getSelectedBlockClientId,
			getBlockParentsByBlockName,
			hasSelectedInnerBlock,
		} = select('core/block-editor');

		if (!hasSelectedInnerBlock(ownProps.clientId, true)) {
			return {
				activeTabIndex: -1,
				setAttributes: ownProps.setAttributes,
			};
		}

		let selected = getSelectedBlockClientId();

		if (
			!['dsfr/fr-tabs-panel', 'dsfr/fr-tabs-list-item'].includes(
				getBlockName(selected)
			)
		) {
			selected = getBlockParentsByBlockName(selected, [
				'dsfr/fr-tabs-list-item',
				'dsfr/fr-tabs-panel',
			])[0];
		}

		return {
			activeTabIndex:
				getBlockIndex(selected) -
				('dsfr/fr-tabs-panel' === getBlockName(selected) ? 1 : 0),
			setAttributes: ownProps.setAttributes,
		};
	}),
])(TabsFocus);
