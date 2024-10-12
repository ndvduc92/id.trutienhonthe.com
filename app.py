
ids = []
for i in range(0, 20):
  for j in range(0,60):
    ids.append("'<0><{}:{}>'".format(i,j))

f = open("res.txt", "w")
f.write(','.join(ids))
f.close()