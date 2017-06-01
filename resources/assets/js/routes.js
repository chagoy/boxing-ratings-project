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
		path: '/:network/:date',
		name: 'card', 
		component: require('./views/Card')
	},
	{
		path: '/submit',
		component: require('./views/Submit')
	},
	{
		path: '/contact',
		component: require('./views/Contact')
	}
	
];

export default new VueRouter({

	routes,

	linkActiveClass: 'is-active'

});