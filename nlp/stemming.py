# import these modules 
import sys
from nltk.stem import PorterStemmer 
from nltk.tokenize import word_tokenize 
import requests
ps = PorterStemmer() 

# choose some words to be stemmed 
words = ["program","jeans", "programs", "programer", "programing", "programers"]
# print("hello") 
# print(sys.argv[0])
print(ps.stem(sys.argv[1]))
# for w in words: 
# 	print(w, " : ", ps.stem(w)) 
