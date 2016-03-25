let scrollAnimation, userCanScroll = true, scrollLinks;

export default scrollLink => {
  document.addEventListener('mousewheel', mouseWheelScrollHandler);

  scrollLinks = document.querySelectorAll(scrollLink);
  [...scrollLinks].forEach(link => {
    link.addEventListener('click', e => {
      // op deze manier oplossen omdat currentTarget
      // "null" is door een of andere bubbling bug
      scrollLinkClickHandler(e, link);
    });
  });
};

// HANDLERS

const scrollLinkClickHandler = (e, link) => {
  e.preventDefault();
  let targetId = link.getAttribute('href');

  prepareScrollToId(targetId);
};
const mouseWheelScrollHandler = (e) => {
  if (!userCanScroll) e.preventDefault();
};

// SCROLLING FUNCTIONS

const prepareScrollToId = id => {

  let l = id.length;
  let indexOfScrolling;


  for (var i = 0; i <= l - 1; i++) {
    let char = id.substring(i, 1);
    if (char == '#') {
      indexOfScrolling = i - 1;
      break;
    }
  }

  id = id.substring(indexOfScrolling);
  if (id.substring(0, 1) != '#') return;

  let containerPosition = document.querySelector(id).offsetTop;

  scrollAnimation = window.requestAnimationFrame(() => {
    scrollToPosition(containerPosition);
  });
};
const scrollToPosition = pos => {
  let currentY = window.pageYOffset;
  let margin = 40;
  let speed = margin * Math.ceil(pos - currentY)/1000;
  let scrollSize = currentY + speed;

  if (currentY < pos - margin) {
    userCanScroll = false;
    window.scroll(0, scrollSize);
    scrollAnimation = window.requestAnimationFrame(() => {
      scrollToPosition(pos);
    });
  } else {
    userCanScroll = true;
    window.cancelAnimationFrame(scrollAnimation);
  }
};
