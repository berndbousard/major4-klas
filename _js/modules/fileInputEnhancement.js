let inputClass, labelClass;

export default (originalInputClass, replacementLabelClass) => {
  inputClass = originalInputClass;
  labelClass = replacementLabelClass;

  let fileInputFields = document.querySelectorAll(inputClass);
  [...fileInputFields].forEach(input => {
    input.addEventListener('change', fileInputChangeHandler);
  });
};

const fileInputChangeHandler = e => {
  let id = e.target.id;
  let fileName = e.target.value.split(/(\\|\/)/g).pop();

  let label = getReplacementLabel(id);
  updateReplacementLabel(label, fileName);
};

const getReplacementLabel = (id) => {
  return document.querySelector(`label[for="${id}"]${labelClass}`);
};

const updateReplacementLabel = (label, content) => {
  label.innerText = content;
};
