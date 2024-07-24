import { __ } from '@wordpress/i18n';
import { BlockControls } from '@wordpress/block-editor';
import { withDispatch, withSelect } from '@wordpress/data';
import { compose } from '@wordpress/compose';
import { createBlock } from '@wordpress/blocks';
import { ToolbarGroup } from '@wordpress/components';

const ComposeBlockControls = ({
	index,
	count,
	onMoveDown,
	onMoveUp,
	onRemoveBlocks,
	onInsertBlock,
}) => (
	<BlockControls key="toolbar">
		<ToolbarGroup
			controls={[
				{
					icon: 'arrow-left-alt2',
					title: __("Placer l'item avant", 'wp-dsfr-blocks'),
					isDisabled: 0 === index,
					onClick: () => {
						onMoveUp(index);
					},
				},
				{
					icon: 'arrow-right-alt2',
					title: __("Placer l'item après", 'wp-dsfr-blocks'),
					isDisabled: count === index + 1,
					onClick: () => {
						onMoveDown(index);
					},
				},
			]}
		/>
		<ToolbarGroup
			controls={[
				{
					icon: 'table-col-before',
					title: __('Ajouter un item avant', 'wp-dsfr-blocks'),
					onClick: () => {
						onInsertBlock(index);
					},
				},
				{
					icon: 'table-col-after',
					title: __('Ajouter un item après', 'wp-dsfr-blocks'),
					onClick: () => {
						onInsertBlock(index + 1);
					},
				},
				{
					icon: 'trash',
					title: __("Supprimer l'item", 'wp-dsfr-blocks'),
					onClick: () => {
						onRemoveBlocks(index);
					},
				},
			]}
		/>
	</BlockControls>
);

export default compose([
	withSelect((select, ownProps) => {
		const { getBlockOrder, getBlockRootClientId } =
			select('core/block-editor');
		const tabsListId = getBlockRootClientId(ownProps.clientId);
		const tabsListItemIds = getBlockOrder(tabsListId);
		const tabsId = getBlockRootClientId(tabsListId);
		const tabsPanelIds = [...getBlockOrder(tabsId)];

		// remove tabs list id
		tabsPanelIds.shift();

		return {
			tabsId,
			tabsListId,
			tabsListItemIds,
			count: tabsListItemIds.length,
			tabsPanelIds,
			clientId: ownProps.clientId,
			index: ownProps.index,
		};
	}),
	withDispatch(
		(dispatch, { tabsListItemIds, tabsListId, tabsPanelIds, tabsId }) => {
			const {
				removeBlock,
				moveBlocksDown,
				moveBlocksUp,
				insertBlock,
				updateBlockAttributes,
			} = dispatch('core/block-editor');

			return {
				onMoveDown(index) {
					updateBlockAttributes(
						[tabsListItemIds[index], tabsPanelIds[index]],
						{
							lock: { move: false, remove: true },
						}
					);

					moveBlocksDown([tabsPanelIds[index]], tabsId);
					moveBlocksDown([tabsListItemIds[index]], tabsListId);

					updateBlockAttributes(
						[tabsListItemIds[index], tabsPanelIds[index]],
						{
							lock: { move: true, remove: true },
						}
					);
				},
				onMoveUp(index) {
					updateBlockAttributes(
						[tabsListItemIds[index], tabsPanelIds[index]],
						{
							lock: { move: false, remove: true },
						}
					);

					moveBlocksUp([tabsPanelIds[index]], tabsId);
					moveBlocksUp([tabsListItemIds[index]], tabsListId);

					updateBlockAttributes(
						[tabsListItemIds[index], tabsPanelIds[index]],
						{
							lock: { move: true, remove: true },
						}
					);
				},
				onRemoveBlocks(index) {
					updateBlockAttributes(
						[tabsListItemIds[index], tabsPanelIds[index]],
						{
							lock: { move: true, remove: false },
						}
					);

					removeBlock(tabsPanelIds[index]);
					removeBlock(tabsListItemIds[index]);
				},
				onInsertBlock(index) {
					const listItem = createBlock('dsfr/fr-tabs-list-item', {
						lock: { move: true, remove: true },
					});
					const panel = createBlock('dsfr/fr-tabs-panel', {
						lock: { move: true, remove: true },
					});

					insertBlock(panel, index + 1, tabsId);
					insertBlock(listItem, index, tabsListId);
				},
			};
		}
	),
])(ComposeBlockControls);
