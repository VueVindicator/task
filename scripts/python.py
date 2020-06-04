def foo(name, id, email, language):
     d = dict();
     d['output'] = 'Hello world, this is %d with HNGi7 ID %d using %d for stage 2 task' % (name, id, language)
     d['id'] = id
     d['name']   = name
     d['email']   = email
     d['language']   = language
     return d
print foo('David', 'HNGi7-5555', 'storm@gmail.com', 'python')