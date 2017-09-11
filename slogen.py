#!/usr/bin/env python
import sys
try:
  filename = sys.argv[1]
#except FileNotFoundError:
#  print 'file not found\n'
except IndexError:
  print 'usage: slogen.py filename.txt\n'
  exit(1)
except:
  print("Unexpected error:", sys.exc_info()[0])
  exit(1)
