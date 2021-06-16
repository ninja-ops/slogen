#!/usr/bin/env python
import sys
from random import randint

try:
  filename = sys.argv[1]
#except FileNotFoundError:
#  print 'file not found\n'
except IndexError:
  print('usage: slogen.py filename.txt\n')
  exit(1)
except:
  print("Unexpected error:", sys.exc_info()[0])
  exit(1)

do_hashtag = False
if ('--hashtag' in sys.argv):
  do_hashtag = True

data = open(filename, 'r').read()
chunks = data.split('\n\n')

msg = ''
for chunk in chunks:
  lines = chunk.strip().split('\n')
  if len(lines) > 1:
    rnd = randint(0, len(lines)-1)
    msg = msg + ' ' +lines[rnd]

msg = msg.strip()
if do_hashtag:
  words = msg.split(' ')
  i = 0;
  for word in words:
    if ((word[0:1] == word[0:1].upper()) & (len(word) > 3)):
      word = '#' + word
      words[i] = word
    i = i + 1
  msg = ' '.join(words)

print(msg)
