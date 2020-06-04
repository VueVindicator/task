function hello(name, id, email, language) {
    let object = {
        'output': `Hello world, this is ${name} with HNGi7 ID ${id} using ${language} for stage 2 task`,
        'id': id,
        'name': name,
        'email': email,
        'language': language
    }
    console.log(object)
}

hello('David Ajayi', 'HNGi7-102993', 'david.ajayi.anu@gmail.com', 'Javascript');