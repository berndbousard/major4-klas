"use strict";

const init = () => {
	initJSPerfections();
	initTabFunctions();
};

const initJSPerfections = () => {
	OnJSHides();
	OnJSShows();
};

const OnJSHides = () => {
	[...document.querySelectorAll('[data-on-js="hide"]')].forEach(item => {
		item.classList.add('hide');
	});
};
const OnJSShows = () => {
	[...document.querySelectorAll('[data-on-js="show"]')].forEach(item => {
		item.classList.remove('hide');
	});
};
const initTabFunctions = () => {
	let tabs = document.querySelectorAll('.tab-navigation .tab-header');
	let forms = document.querySelectorAll('.main-form');

	[...tabs].forEach((tab, i) => {
		tab.addEventListener('click', e => {
			tabClickHandler(e, i, tabs, [...forms]);
		});
	});
};
const tabClickHandler = (e, index, tabs, tabItems) => {
	
	//handle form switch
	let className = tabItems[0].classList[0];
	let previousItem = document.querySelector(`.${className}:not(.hide)`);
	if (previousItem) switchTabItems(previousItem, tabItems[index]);

	//handle active state
	className = tabs[0].classList[0];
	let previousActive = document.querySelector(`.${className}.active`);
	if (previousActive) changeTabActiveState(previousActive, tabs[index]);
};
const changeTabActiveState = (oldObj, newObj) => {
	oldObj.classList.remove('active');
	newObj.classList.add('active');
};
const switchTabItems = (oldObj, newObj) => {
	oldObj.classList.add('hide');
	newObj.classList.remove('hide');
};


init();