from __future__ import unicode_literals, absolute_import, print_function
import codecs
import os

default_sketch_code = """int led = 13;
void setup() {
  pinMode(led, OUTPUT);
}
void loop() {
  digitalWrite(led, HIGH);
  delay(1000);
  digitalWrite(led, LOW);
  delay(1000);
}
"""
default_sketch_name = 'ArdublocklySketch'
default_sketch_dir = 'test3'

def create_sketch(sketch_dir = default_sketch_dir, sketch_name=default_sketch_name,
                  sketch_code=default_sketch_code):
	sketch_name = 'ArdublocklySketch'
	sketch_code = """int led = 13;
	void setup() {
	  pinMode(led, OUTPUT);
	}
	void loop() {
	  digitalWrite(led, HIGH);
	  delay(1000);
	  digitalWrite(led, LOW);
	  delay(1000);
	}
	"""
	sketch_dir = 'test3'
  
	if not isinstance(sketch_code, str) or \
		not isinstance(sketch_name, str):
    	#2에서는 basestring, 3는 str
            #첫 번째 인수로 인스턴스, 두 번째 인수로 클래스 이름을 받는다.
            #입력으로 받은 인스턴스가 그 클래스의 인스턴스인지를 판단하여 참이면 True, 거짓이면 False를 리턴한다.

		print('The sketch name or code given is not a valid string !!!') # 문자열이 유효한건지
		return None
    # 스케치 경로 생성
	sketch_path = build_sketch_path(sketch_dir, sketch_name)
	try:
		with codecs.open(sketch_path, 'wb+', encoding='utf-8') as sketch_f: # with as 파일 읽고 쓸때 사용. with에서 열고 닫는 것 자동 처리, as 들어갈 내용.
			sketch_f.write(sketch_code) # 인코딩을 지정해 파일 읽고 쓰기 또는 아스키 이외의 기타 갖은 인코딩으로 된 텍스트 파일 읽기 codecs로 열어줌
	except Exception as e: # try 오류 나면
		print('Error: %s\nArduino sketch could not be created !!!' % e)
		return None
	
	return sketch_path

def build_sketch_path(sketch_dir, sketch_name):
    """
    유효한 Sketch에 필요한 Arduino Sketch 폴더를 만
    유효한 디렉토리가 제공된 경우, Arduino 스케치 폴더(이미 존재하지 않는 경우)를 
    만들고, 이 폴더를 가리키는 문자열을 반환합니다.
     스케치 파일 경로.
     : return : 스케치 파일의 전체 경로가있는 유니 코드 문자열입니다.
              Return None은 오류가 발생했음을 나타냅니다.
    """
    sketch_path = None
    if os.path.isdir(sketch_dir):
    	try:
    		sketch_path = os.path.join(sketch_dir, sketch_name) #
    	except (TypeError, AttributeError) as e: # 오류
    		print('Error: %s\nSketch Name could not be processed.' % e)
    	else:
    		if not os.path.exists(sketch_path): # 특정 폴더가 있나 없나 검사하고 없으면 만들어
    			os.makedirs(sketch_path)
    		sketch_path = os.path.join(sketch_path, sketch_name + '.ino') # 그리고 그 폰더 안에서 sketcg_name에 .ino를 붙여 만들어준다.
    else: # 아니면 
    	print('The sketch directory "%s" does not exists !!!' % sketch_dir) # 존재 x
    return sketch_path
