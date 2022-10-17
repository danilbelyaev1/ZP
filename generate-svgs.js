const svgstore = require('svgstore');
const fs = require('fs');
const path = require('path');

let sprite = svgstore();

const folder = path.join(__dirname, './local/templates/main/img/icons');
fs.readdir(folder, (err, files) => {
	files.forEach(file => {
		sprite = sprite.add(`icon_${file.split('.')[0]}`, fs.readFileSync(path.join(folder, file), 'utf8'));
	});

	fs.writeFileSync(path.join(__dirname, './local/templates/main/build/sprite.svg'), sprite);
});

