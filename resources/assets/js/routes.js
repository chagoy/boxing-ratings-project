import VueRouter from 'vue-router';

let routes = [
	{
		path: '/',
		component: require('./views/Home')
	},
	{
		path: '/about',
		component: require('./views/About')
	},
	{
		path: '/promoters',
		component: require('./views/Promoters')
	},
	{
		path: '/promoters/:promoter',
		name: 'promoter',
		component: require('./views/Promoter')
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
		path: '/venue/:venue',
		name: 'venue',
		component: require('./views/Location')
	},
	{
		path: '/networks',
		component: require('./views/Networks')
	},
	{
		path: '/networks/:network',
		name: 'network',
		component: require('./views/Network')
	},
	{
		path: '/:network/:date',
		name: 'card', 
		component: require('./views/Card')
	},
	{
		path: '/locations',
		component: require('./views/Locations')
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