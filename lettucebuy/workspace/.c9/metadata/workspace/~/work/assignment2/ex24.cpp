{"filter":false,"title":"ex24.cpp","tooltip":"~/work/assignment2/ex24.cpp","undoManager":{"mark":100,"position":100,"stack":[[{"start":{"row":38,"column":16},"end":{"row":38,"column":17},"action":"insert","lines":["p"],"id":278}],[{"start":{"row":38,"column":17},"end":{"row":38,"column":18},"action":"insert","lines":["a"],"id":279}],[{"start":{"row":38,"column":18},"end":{"row":38,"column":19},"action":"insert","lines":["r"],"id":280}],[{"start":{"row":38,"column":19},"end":{"row":38,"column":20},"action":"insert","lines":["e"],"id":281}],[{"start":{"row":38,"column":20},"end":{"row":38,"column":21},"action":"insert","lines":["_"],"id":282}],[{"start":{"row":38,"column":13},"end":{"row":38,"column":21},"action":"remove","lines":["compare_"],"id":283},{"start":{"row":38,"column":13},"end":{"row":38,"column":27},"action":"insert","lines":["compare_nocase"]}],[{"start":{"row":27,"column":0},"end":{"row":27,"column":2},"action":"insert","lines":["  "],"id":284}],[{"start":{"row":27,"column":0},"end":{"row":27,"column":2},"action":"insert","lines":["  "],"id":285},{"start":{"row":28,"column":0},"end":{"row":28,"column":2},"action":"insert","lines":["  "]},{"start":{"row":29,"column":0},"end":{"row":29,"column":2},"action":"insert","lines":["  "]},{"start":{"row":30,"column":0},"end":{"row":30,"column":2},"action":"insert","lines":["  "]},{"start":{"row":31,"column":0},"end":{"row":31,"column":2},"action":"insert","lines":["  "]},{"start":{"row":32,"column":0},"end":{"row":32,"column":2},"action":"insert","lines":["  "]},{"start":{"row":33,"column":0},"end":{"row":33,"column":2},"action":"insert","lines":["  "]},{"start":{"row":34,"column":0},"end":{"row":34,"column":2},"action":"insert","lines":["  "]},{"start":{"row":35,"column":0},"end":{"row":35,"column":2},"action":"insert","lines":["  "]},{"start":{"row":36,"column":0},"end":{"row":36,"column":2},"action":"insert","lines":["  "]}],[{"start":{"row":26,"column":2},"end":{"row":36,"column":3},"action":"remove","lines":["bool compare_nocase (const std::string& first, const std::string& second)","    {","    unsigned int i=0;","    while ( (i<first.length()) && (i<second.length()) )","    {","      if (tolower(first[i])<tolower(second[i])) return true;","      else if (tolower(first[i])>tolower(second[i])) return false;","      ++i;","    }","    return ( first.length() < second.length() );","  }"],"id":286}],[{"start":{"row":14,"column":0},"end":{"row":24,"column":3},"action":"insert","lines":["bool compare_nocase (const std::string& first, const std::string& second)","    {","    unsigned int i=0;","    while ( (i<first.length()) && (i<second.length()) )","    {","      if (tolower(first[i])<tolower(second[i])) return true;","      else if (tolower(first[i])>tolower(second[i])) return false;","      ++i;","    }","    return ( first.length() < second.length() );","  }"],"id":287}],[{"start":{"row":38,"column":2},"end":{"row":38,"column":4},"action":"remove","lines":["my"],"id":288},{"start":{"row":38,"column":2},"end":{"row":38,"column":3},"action":"insert","lines":["n"]}],[{"start":{"row":38,"column":3},"end":{"row":38,"column":4},"action":"insert","lines":["a"],"id":289}],[{"start":{"row":38,"column":4},"end":{"row":38,"column":5},"action":"insert","lines":["m"],"id":290}],[{"start":{"row":38,"column":5},"end":{"row":38,"column":6},"action":"insert","lines":["e"],"id":291}],[{"start":{"row":38,"column":9},"end":{"row":38,"column":10},"action":"insert","lines":["t"],"id":292}],[{"start":{"row":39,"column":3},"end":{"row":39,"column":4},"action":"remove","lines":["/"],"id":293}],[{"start":{"row":39,"column":2},"end":{"row":39,"column":3},"action":"remove","lines":["/"],"id":294}],[{"start":{"row":39,"column":34},"end":{"row":40,"column":0},"action":"insert","lines":["",""],"id":295},{"start":{"row":40,"column":0},"end":{"row":40,"column":2},"action":"insert","lines":["  "]}],[{"start":{"row":40,"column":2},"end":{"row":42,"column":20},"action":"insert","lines":["for (it=mylist.begin(); it!=mylist.end(); ++it)","    std::cout << ' ' << *it;","  std::cout << '\\n';"],"id":296}],[{"start":{"row":40,"column":10},"end":{"row":40,"column":16},"action":"remove","lines":["mylist"],"id":297},{"start":{"row":40,"column":10},"end":{"row":40,"column":11},"action":"insert","lines":["n"]}],[{"start":{"row":40,"column":11},"end":{"row":40,"column":12},"action":"insert","lines":["a"],"id":298}],[{"start":{"row":40,"column":12},"end":{"row":40,"column":13},"action":"insert","lines":["m"],"id":299}],[{"start":{"row":40,"column":13},"end":{"row":40,"column":14},"action":"insert","lines":["e"],"id":300}],[{"start":{"row":40,"column":14},"end":{"row":40,"column":15},"action":"insert","lines":["l"],"id":301}],[{"start":{"row":40,"column":15},"end":{"row":40,"column":16},"action":"insert","lines":["i"],"id":302}],[{"start":{"row":40,"column":16},"end":{"row":40,"column":17},"action":"insert","lines":["s"],"id":303}],[{"start":{"row":40,"column":17},"end":{"row":40,"column":18},"action":"insert","lines":["t"],"id":304}],[{"start":{"row":40,"column":33},"end":{"row":40,"column":34},"action":"remove","lines":["y"],"id":305}],[{"start":{"row":40,"column":32},"end":{"row":40,"column":33},"action":"remove","lines":["m"],"id":306}],[{"start":{"row":40,"column":32},"end":{"row":40,"column":33},"action":"insert","lines":["n"],"id":307}],[{"start":{"row":40,"column":33},"end":{"row":40,"column":34},"action":"insert","lines":["a"],"id":308}],[{"start":{"row":40,"column":34},"end":{"row":40,"column":35},"action":"insert","lines":["m"],"id":309}],[{"start":{"row":40,"column":35},"end":{"row":40,"column":36},"action":"insert","lines":["e"],"id":310}],[{"start":{"row":40,"column":7},"end":{"row":40,"column":8},"action":"insert","lines":["s"],"id":311}],[{"start":{"row":40,"column":8},"end":{"row":40,"column":9},"action":"insert","lines":["t"],"id":312}],[{"start":{"row":40,"column":9},"end":{"row":40,"column":10},"action":"insert","lines":["d"],"id":313}],[{"start":{"row":40,"column":10},"end":{"row":40,"column":11},"action":"insert","lines":[":"],"id":314}],[{"start":{"row":40,"column":11},"end":{"row":40,"column":12},"action":"insert","lines":[":"],"id":315}],[{"start":{"row":40,"column":12},"end":{"row":40,"column":13},"action":"insert","lines":["l"],"id":316}],[{"start":{"row":40,"column":13},"end":{"row":40,"column":14},"action":"insert","lines":["i"],"id":317}],[{"start":{"row":40,"column":14},"end":{"row":40,"column":15},"action":"insert","lines":["s"],"id":318}],[{"start":{"row":40,"column":15},"end":{"row":40,"column":16},"action":"insert","lines":["t"],"id":319}],[{"start":{"row":40,"column":16},"end":{"row":40,"column":17},"action":"insert","lines":["<"],"id":320}],[{"start":{"row":40,"column":17},"end":{"row":40,"column":18},"action":"insert","lines":[">"],"id":321}],[{"start":{"row":40,"column":17},"end":{"row":40,"column":18},"action":"insert","lines":["s"],"id":322}],[{"start":{"row":40,"column":18},"end":{"row":40,"column":19},"action":"insert","lines":["t"],"id":323}],[{"start":{"row":40,"column":19},"end":{"row":40,"column":20},"action":"insert","lines":["r"],"id":324}],[{"start":{"row":40,"column":20},"end":{"row":40,"column":21},"action":"insert","lines":["i"],"id":325}],[{"start":{"row":40,"column":21},"end":{"row":40,"column":22},"action":"insert","lines":["n"],"id":326}],[{"start":{"row":40,"column":22},"end":{"row":40,"column":23},"action":"insert","lines":["g"],"id":327}],[{"start":{"row":40,"column":24},"end":{"row":40,"column":25},"action":"insert","lines":[":"],"id":328}],[{"start":{"row":40,"column":25},"end":{"row":40,"column":26},"action":"insert","lines":[":"],"id":329}],[{"start":{"row":40,"column":26},"end":{"row":40,"column":27},"action":"insert","lines":["i"],"id":330}],[{"start":{"row":40,"column":27},"end":{"row":40,"column":28},"action":"insert","lines":["t"],"id":331}],[{"start":{"row":40,"column":28},"end":{"row":40,"column":29},"action":"insert","lines":["e"],"id":332}],[{"start":{"row":40,"column":29},"end":{"row":40,"column":30},"action":"insert","lines":["r"],"id":333}],[{"start":{"row":40,"column":30},"end":{"row":40,"column":31},"action":"insert","lines":["a"],"id":334}],[{"start":{"row":40,"column":31},"end":{"row":40,"column":32},"action":"insert","lines":["t"],"id":335}],[{"start":{"row":40,"column":32},"end":{"row":40,"column":33},"action":"insert","lines":["o"],"id":336}],[{"start":{"row":40,"column":33},"end":{"row":40,"column":34},"action":"insert","lines":["r"],"id":337}],[{"start":{"row":40,"column":34},"end":{"row":40,"column":35},"action":"insert","lines":[" "],"id":338}],[{"start":{"row":30,"column":0},"end":{"row":30,"column":34},"action":"remove","lines":["  cout << \"The sorted names are:\";"],"id":339}],[{"start":{"row":30,"column":0},"end":{"row":37,"column":1},"action":"remove","lines":[""," /* for (std::list<string>::iterator it = namelist.begin(); it != namelist.end(); it++){","    namelist[0]=\"please\";","  }","  */","  ","  "," "],"id":340}],[{"start":{"row":30,"column":1},"end":{"row":31,"column":0},"action":"insert","lines":["",""],"id":341},{"start":{"row":31,"column":0},"end":{"row":31,"column":1},"action":"insert","lines":[" "]}],[{"start":{"row":31,"column":1},"end":{"row":32,"column":0},"action":"insert","lines":["",""],"id":342},{"start":{"row":32,"column":0},"end":{"row":32,"column":1},"action":"insert","lines":[" "]}],[{"start":{"row":32,"column":1},"end":{"row":33,"column":0},"action":"insert","lines":["",""],"id":343},{"start":{"row":33,"column":0},"end":{"row":33,"column":1},"action":"insert","lines":[" "]}],[{"start":{"row":31,"column":1},"end":{"row":33,"column":29},"action":"insert","lines":["mylist.push_back (\"one\");","  mylist.push_back (\"two\");","  mylist.push_back (\"Three\");"],"id":344}],[{"start":{"row":31,"column":1},"end":{"row":31,"column":2},"action":"insert","lines":[" "],"id":345}],[{"start":{"row":31,"column":3},"end":{"row":31,"column":4},"action":"remove","lines":["y"],"id":346}],[{"start":{"row":31,"column":2},"end":{"row":31,"column":3},"action":"remove","lines":["m"],"id":347}],[{"start":{"row":31,"column":2},"end":{"row":31,"column":3},"action":"insert","lines":["n"],"id":348}],[{"start":{"row":31,"column":3},"end":{"row":31,"column":4},"action":"insert","lines":["a"],"id":349}],[{"start":{"row":31,"column":4},"end":{"row":31,"column":5},"action":"insert","lines":["m"],"id":350}],[{"start":{"row":31,"column":5},"end":{"row":31,"column":6},"action":"insert","lines":["e"],"id":351}],[{"start":{"row":32,"column":2},"end":{"row":32,"column":4},"action":"remove","lines":["my"],"id":352},{"start":{"row":32,"column":2},"end":{"row":32,"column":3},"action":"insert","lines":["n"]}],[{"start":{"row":32,"column":3},"end":{"row":32,"column":4},"action":"insert","lines":["a"],"id":353}],[{"start":{"row":32,"column":4},"end":{"row":32,"column":5},"action":"insert","lines":["m"],"id":354}],[{"start":{"row":32,"column":5},"end":{"row":32,"column":6},"action":"insert","lines":["e"],"id":355}],[{"start":{"row":33,"column":2},"end":{"row":33,"column":4},"action":"remove","lines":["my"],"id":356},{"start":{"row":33,"column":2},"end":{"row":33,"column":3},"action":"insert","lines":["n"]}],[{"start":{"row":33,"column":3},"end":{"row":33,"column":4},"action":"insert","lines":["a"],"id":357}],[{"start":{"row":33,"column":4},"end":{"row":33,"column":5},"action":"insert","lines":["m"],"id":358}],[{"start":{"row":33,"column":5},"end":{"row":33,"column":6},"action":"insert","lines":["e"],"id":359}],[{"start":{"row":28,"column":18},"end":{"row":28,"column":23},"action":"remove","lines":["\"Eve\""],"id":360}],[{"start":{"row":31,"column":22},"end":{"row":31,"column":27},"action":"remove","lines":["\"one\""],"id":361},{"start":{"row":31,"column":22},"end":{"row":31,"column":27},"action":"insert","lines":["\"Eve\""]}],[{"start":{"row":28,"column":19},"end":{"row":28,"column":26},"action":"remove","lines":["\"David\""],"id":362}],[{"start":{"row":32,"column":22},"end":{"row":32,"column":27},"action":"remove","lines":["\"two\""],"id":363},{"start":{"row":32,"column":22},"end":{"row":32,"column":29},"action":"insert","lines":["\"David\""]}],[{"start":{"row":28,"column":20},"end":{"row":28,"column":26},"action":"remove","lines":["\"Adam\""],"id":364}],[{"start":{"row":33,"column":22},"end":{"row":33,"column":29},"action":"remove","lines":["\"Three\""],"id":365},{"start":{"row":33,"column":22},"end":{"row":33,"column":28},"action":"insert","lines":["\"Adam\""]}],[{"start":{"row":34,"column":1},"end":{"row":34,"column":29},"action":"insert","lines":["namelist.push_back (\"Adam\");"],"id":366}],[{"start":{"row":34,"column":21},"end":{"row":34,"column":27},"action":"remove","lines":["\"Adam\""],"id":367},{"start":{"row":34,"column":21},"end":{"row":34,"column":28},"action":"insert","lines":["\"Jacob\""]}],[{"start":{"row":29,"column":24},"end":{"row":29,"column":72},"action":"remove","lines":["(mylis, mylis + sizeof(mylis) / sizeof(string) )"],"id":368}],[{"start":{"row":28,"column":2},"end":{"row":28,"column":30},"action":"remove","lines":["string mylis[]={,,,\"Jacob\"};"],"id":369}],[{"start":{"row":28,"column":0},"end":{"row":28,"column":2},"action":"remove","lines":["  "],"id":370}],[{"start":{"row":27,"column":2},"end":{"row":28,"column":0},"action":"remove","lines":["",""],"id":371}],[{"start":{"row":27,"column":0},"end":{"row":27,"column":2},"action":"remove","lines":["  "],"id":372}],[{"start":{"row":26,"column":1},"end":{"row":27,"column":0},"action":"remove","lines":["",""],"id":373}],[{"start":{"row":28,"column":0},"end":{"row":28,"column":1},"action":"remove","lines":[" "],"id":374}],[{"start":{"row":27,"column":25},"end":{"row":28,"column":0},"action":"remove","lines":["",""],"id":375}],[{"start":{"row":33,"column":16},"end":{"row":33,"column":30},"action":"remove","lines":["compare_nocase"],"id":377}],[{"start":{"row":14,"column":0},"end":{"row":24,"column":3},"action":"remove","lines":["bool compare_nocase (const std::string& first, const std::string& second)","    {","    unsigned int i=0;","    while ( (i<first.length()) && (i<second.length()) )","    {","      if (tolower(first[i])<tolower(second[i])) return true;","      else if (tolower(first[i])>tolower(second[i])) return false;","      ++i;","    }","    return ( first.length() < second.length() );","  }"],"id":378}],[{"start":{"row":13,"column":20},"end":{"row":14,"column":0},"action":"remove","lines":["",""],"id":379}]]},"ace":{"folds":[],"scrolltop":288,"scrollleft":0,"selection":{"start":{"row":13,"column":20},"end":{"row":13,"column":20},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1477093848062,"hash":"75b35b6dd2ec7b51924c7d1124ef5682752a8afb"}