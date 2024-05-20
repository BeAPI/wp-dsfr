export default function (prefix) {
	return prefix + '-' + Math.round(Math.random() * 16777215).toString(32);
}
