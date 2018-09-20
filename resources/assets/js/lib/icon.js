const icon = function icon(fileName) {
  if (fileName.startsWith('fa')) {
    const [_, folder, icon] = fileName.split('-');
    return require('@fortawesome/fontawesome-free/svgs/' +
      folder +
      '/' +
      icon +
      '.svg');
  }
  return require('../../icons/' + fileName + '.svg');
};

export default icon;
