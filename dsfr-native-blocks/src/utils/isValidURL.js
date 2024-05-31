export default function (str) {
	try {
		new URL(str);
	} catch {
		return false;
	}

	return true;
}
