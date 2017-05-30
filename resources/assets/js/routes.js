import VueRouter from 'vue-router';

let routes = [
	{
		path: '/',
		component: require('./views/Home')
	},
	{
		path: '/promoters',
		component: require('./views/Promoters')
	},
	{
		path: '/boxers',
		component: require('./views/Boxer')
	},
	{
		path: '/boxers/:boxer',
		name: 'boxer',
		component: require('./views/Boxer')
	},
	{
		path: '/networks',
		component: require('./views/Networks')
	},
	{
		path: '/networks/:network',
		component: require('./views/Network')
	},
	{
		path: '/submit',
		component: require('./views/Submit')
	},
	{
		path: '/contact',
		component: require('./views/Contact')
	},
	{
		path: '/cards',
		component: require('./views/Cards')
	}
	
];

export default new VueRouter({

	routes,

	linkActiveClass: 'is-active'

});