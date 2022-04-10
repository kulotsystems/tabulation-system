const rules = {
    guest: {
        guest: {
            accept  : true,
        },
        user : {
            accept  : false,
            redirect: '/'
        }
    },
    user: {
        guest: {
            accept  : false,
            redirect: '/admin'
        },
        user : {
            accept  : true,
        }
    },
    anyone: {
        guest: {
            accept  : true,
        },
        user : {
            accept  : true,
        }
    }
};

export default rules;
