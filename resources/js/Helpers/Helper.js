const separateString = (str) => {
  let result = "";
  let size = 2;

  for (let i = 0; i < str.length; i += size) {
    if (i >= 6) {
      size = 3;
    }
    result += str.substring(i, i + size) + "-";
  }
  return result.substring(0, result.length - 1);
};

export { separateString };
